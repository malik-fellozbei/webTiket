<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'name',
        'price',
        'quantity',
        'available_from',
        'available_to',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'available_from' => 'datetime',
            'available_to' => 'datetime',
        ];
    }

    /**
     * Relasi: Sebuah jenis Tiket dimiliki oleh satu Event.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}