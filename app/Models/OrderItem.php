<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'event_id',
        'ticket_id',
        'user_id',
        'ticket_code',
        'attendee_name',
        'price',
        'is_scanned',
        'scanned_at',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'is_scanned' => 'boolean',
            'scanned_at' => 'datetime',
        ];
    }

    /**
     * Relasi: Sebuah OrderItem dimiliki oleh satu Order.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relasi: Sebuah OrderItem merujuk ke satu Event.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Relasi: Sebuah OrderItem merujuk ke satu jenis Tiket.
     */
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * Relasi: Sebuah OrderItem dimiliki oleh satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}