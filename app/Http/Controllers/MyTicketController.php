<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MyTicketController extends Controller
{
    public function index()
    {
        $myTickets = OrderItem::where('user_id', Auth::id())
            ->whereHas('order', function ($query) {
                $query->where('status', 'paid');
            })
            ->with(['event', 'ticket', 'attendee'])
            ->latest()
            ->get();

        return view("pages.myticket.myticket", [
            'myTickets' => $myTickets
        ]);
    }

    public function show(OrderItem $orderItem)
    {
        if (Auth::id() !== $orderItem->user_id) {
            abort(403, 'Unauthorized Access');
        }
    
        $orderItem->load(['event', 'ticket', 'order', 'attendee']);
    
        return view("pages.myticket.detail", [
            'ticket' => $orderItem
        ]);
    }

    public function download(OrderItem $orderItem)
    {
        if (Auth::id() !== $orderItem->user_id) {
            abort(403, 'UNAUTHORIZED ACTION.');
        }

        $orderItem->load(['event', 'ticket', 'order', 'attendee']);

        $qrCode = base64_encode(
            QrCode::format('png')
                ->size(150)
                ->errorCorrection('H')
                ->generate($orderItem->ticket_code)
        );

        $filename = 'e-ticket-' . $orderItem->ticket_code . '.pdf';

        $pdf = Pdf::loadView('pdf.eticket', [
            'ticket' => $orderItem,
            'qrCode' => $qrCode,
        ]);

        return $pdf->download($filename);
    }
}
