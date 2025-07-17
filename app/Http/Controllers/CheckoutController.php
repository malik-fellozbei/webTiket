<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CheckoutController extends Controller
{

    public function index()
    {
        $cart = session('cart');
        if (empty($cart)) {
            return redirect('/');
        }
        $event = Event::find($cart['event_id']);

        $individualTickets = [];
        foreach ($cart['tickets'] as $item) {
            for ($i = 0; $i < $item['selected_quantity']; $i++) {
                $individualTickets[] = [
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'ticket_id' => $item['id'],
                ];
            }
        }

        return view('pages.checkout.payment', [
            'cart' => $cart,
            'event' => $event,
            'individualTickets' => $individualTickets,
        ]);
    }

    public function store(Request $request)
    {
        $cartData = json_decode($request->input('cart_data'), true);

        if (empty($cartData)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $processedCart = [
            'event_id' => $request->input('event_id'),
            'tickets' => $cartData,
        ];

        session(['cart' => $processedCart]);
        return redirect()->route('checkout.index');
    }



    public function pay(Request $request)
    {
        $cart = session('cart');
        if (empty($cart)) {
            return redirect('/');
        }


        $rules = [
            'attendees' => 'required|array',
            'attendees.*.first_name' => 'required|string|max:255',
            'attendees.*.last_name' => 'required|string|max:255',
            'attendees.*.email' => 'required|email:dns|max:255',
            'attendees.*.phone' => 'required|string|max:20',
            'attendees.*.birthdate' => ['required', 'date', Rule::date()->beforeOrEqual(today())],
            'attendees.*.identity_number' => 'required|string|min:16|max:16',
            'attendees.*.ticket_id' => 'required|integer|exists:tickets,id',
        ];


        $messages = [
            'attendees.*.identity_number.min' => 'The ID number / Passport must be 16 characters.',
            'attendees.*.identity_number.max' => 'The ID number / Passport must be 16 characters.',
            'attendees.*.email.required' => 'The email field is required.',
            'attendees.*.email.email' => 'Please enter a valid email address.',
            'attendees.*.first_name.required' => 'Please enter the first name.',
            'attendees.*.birthdate.before_or_equal' => 'The birthdate cannot be in the future.',
        ];


        $validated = $request->validate($rules, $messages);


        $totalPrice = array_reduce($cart['tickets'], fn($carry, $item) => $carry + ($item['selected_quantity'] * $item['price']), 0);


        DB::transaction(function () use ($validated, $totalPrice, $cart, &$order, &$snapToken) {

            $order = Order::create([
                'user_id' => Auth::id(),
                'transaction_code' => 'TRX-' . time() . Str::upper(Str::random(5)),
                'total_amount' => $totalPrice,
                'status' => 'pending',
            ]);

            $itemDetailsForMidtrans = [];

            foreach ($validated['attendees'] as $attendeeData) {

                $attendee = Attendee::create([
                    'first_name' => $attendeeData['first_name'],
                    'last_name' => $attendeeData['last_name'],
                    'birthdate' => $attendeeData['birthdate'],
                    'email' => $attendeeData['email'],
                    'phone_number' => $attendeeData['phone'],
                    'identity_number' => $attendeeData['identity_number'],
                ]);


                OrderItem::create([
                    'order_id' => $order->id,
                    'event_id' => $cart['event_id'],
                    'user_id' => Auth::id(),
                    'ticket_id' => $attendeeData['ticket_id'],
                    'attendee_id' => $attendee->id,
                    'ticket_code' => 'TICKET-' . Str::upper(Str::random(8)),
                    'price' => \App\Models\Ticket::find($attendeeData['ticket_id'])->price,
                ]);
            }


            foreach ($cart['tickets'] as $item) {
                $itemDetailsForMidtrans[] = ['id' => $item['id'], 'price' => $item['price'], 'quantity' => $item['selected_quantity'], 'name' => $item['name']];
            }


            \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
            \Midtrans\Config::$isProduction = config('services.midtrans.is_production');

            $params = [
                'transaction_details' => ['order_id' => $order->transaction_code, 'gross_amount' => $order->total_amount],
                'customer_details' => ['first_name' => $validated['attendees'][0]['first_name'], 'last_name' => $validated['attendees'][0]['last_name'], 'email' => $validated['attendees'][0]['email'], 'phone' => $validated['attendees'][0]['phone']],
                'item_details' => $itemDetailsForMidtrans,
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $order->update(['snap_token' => $snapToken]);
        });

        session()->forget('cart');
        return view('pages.checkout.payment', ['snapToken' => $snapToken, 'order' => $order]);
    }



    public function paymentSuccess(Order $order)
    {

        $order->load('items.ticket');
        $ticketSummary = $order->items->groupBy('ticket.name')
            ->map(fn($group) => $group->count());

        return view("pages.checkout.payment-success", [
            'order' => $order,
            'ticketSummary' => $ticketSummary
        ]);
    }
    public function paymentFailed()
    {
        return view("pages.checkout.payment-failed");
    }
}
