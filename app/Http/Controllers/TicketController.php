<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(Event $event)
    {
        $tickets = $event->tickets()->get();

        
        $initialTicketsData = $tickets->map(function ($ticket) {
            return [
                'id' => $ticket->id, 
                'name' => $ticket->name,               
                'available_quantity' => $ticket->quantity, 
                'price' => $ticket->price,
            ];
        });

        return view('pages.tiket.detail', [
            'event' => $event,
            'tickets' => $tickets, 
            'initialTicketsData' => $initialTicketsData,
        ]);
    }
}