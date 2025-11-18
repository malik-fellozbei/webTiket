<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'event_category_id',
        'slug',
        'description',
        'location_name',
        'location_city',
        'latitude', 
        'longitude',
        'location_map_embed',
        'start_time',
        'end_time',
        'thumbnail',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'start_time' => 'datetime',
            'end_time' => 'datetime',
            'is_published' => 'boolean',
        ];
    }

    /**
     * Relasi: Sebuah Event memiliki banyak jenis Tiket.
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Get the category that owns the Event
     */
    public function eventCategory(): BelongsTo
    {
        return $this->belongsTo(EventCategory::class);
    }
}
