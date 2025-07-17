<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\EventCategory;
use DateTime;
use Livewire\Component;

class ShowEvents extends Component
{
    
    public $search = '';
    public $time = '';
    public $event_category_id = ''; 
    
    public $perPage = 9;

    public function loadMore()
    {
        $this->perPage += 6;
    }

    public function render()
    {
        
        $categories = EventCategory::orderBy('name')->get();

        
        $query = Event::query()
            ->where('is_published', true)
            ->where('start_time', '>=', now())
            ->orderBy('start_time', 'asc');

        
        $query->when($this->search, function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%');
        });

        
        $query->when($this->time, function ($q) {
            switch ($this->time) {
                case 'today':
                    $q->whereDate('start_time', today());
                    break;
                case 'tomorrow':
                    $q->whereDate('start_time', today()->addDay());
                    break;
                case 'this-week':
                    $q->whereBetween('start_time', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'this-month':
                    $q->whereMonth('start_time', now()->month)->whereYear('start_time', now()->year);
                    break;
                case 'this-year':
                    $q->whereYear('start_time', now()->year);
                    break;
                case 'next-year':
                    $q->whereYear('start_time', now()->addYear()->year);
                    break;
            }
        });

        
        $query->when($this->event_category_id, function ($q) {
            $q->where('event_category_id', $this->event_category_id);
        });

        $events = $query->take($this->perPage)->get();

        return view('livewire.show-events', [
            'events' => $events,
            'categories' => $categories 
        ]);
    }
}