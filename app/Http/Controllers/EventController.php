<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        return view("pages.event.event");
    }

    public function show(Event $event)
    {
        // Ambil 3 event lain secara acak untuk ditampilkan di bagian "Another Event"
        $otherEvents = Event::where('is_published', true)
            ->where('id', '!=', $event->id) // Jangan tampilkan event yang sedang dilihat
            ->inRandomOrder()
            ->take(3)
            ->get();
        // Kirim data event utama dan event lainnya ke view
        return view('pages.datail-event.detail', [
            'event' => $event,
            'otherEvents' => $otherEvents
        ]);
    }
}
