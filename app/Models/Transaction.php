<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tx_ref',
        'type',
        'amount',
        'currency',
        'payment_method',
        'description',
        'status',
        'notes',
        'proof_image',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'created_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Helper: is this a credit transaction?
    public function isCredit(): bool
    {
        return in_array($this->type, ['deposit', 'bonus', 'refund']);
    }

    // Helper: formatted amount with sign
    public function getSignedAmountAttribute(): string
    {
        $sign = $this->isCredit() ? '+' : '-';
        return $sign . number_format(abs($this->amount), 2);
    }

    // Color class helper for frontend
    public function getAmountClassAttribute(): string
    {
        return $this->isCredit() ? 'text-success' : 'text-danger';
    }
}