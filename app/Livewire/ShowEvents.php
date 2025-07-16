<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\EventCategory;
use DateTime;
use Livewire\Component;

class ShowEvents extends Component
{
    
    public $search = '';
    public $dayType = '';
    public $event_category_id = ''; 
    
    public $perPage = 6;

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

        
        $query->when($this->dayType, function ($q) {
            if ($this->dayType === 'weekdays') {
                $q->whereRaw('DAYOFWEEK(start_time) BETWEEN 2 AND 6');
            } elseif ($this->dayType === 'weekends') {
                $q->whereRaw('DAYOFWEEK(start_time) IN (1, 7)');
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