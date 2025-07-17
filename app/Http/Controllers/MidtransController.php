<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function handle(Request $request)
    {
        
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$serverKey = config('services.midtrans.server_key');
        $notification = new Notification();
        $orderId = $notification->order_id;
        $status = $notification->transaction_status;
        $order = Order::where('transaction_code', $orderId)->first();
       
        if ($status == 'capture' || $status == 'settlement') {

            DB::transaction(function () use ($order) {
                
                $order->update(['status' => 'paid']);

                
                $purchasedItems = DB::table('order_items')
                    ->where('order_id', $order->id)
                    ->select('ticket_id', DB::raw('count(*) as quantity_purchased'))
                    ->groupBy('ticket_id')
                    ->get();
                
                
                foreach ($purchasedItems as $item) {
                    Ticket::where('id', $item->ticket_id)->decrement('quantity', $item->quantity_purchased);
                }
            });
        } else if ($status == 'pending') {
            $order->update(['status' => 'pending']);
        } else if ($status == 'deny' || $status == 'expire' || $status == 'cancel') {
            $order->update(['status' => 'failed']);
        }
    }
}