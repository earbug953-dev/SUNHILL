<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'min_investment',
        'max_investment',
        'daily_return',
        'duration_days',
        'total_return',
        'description',
        'active',
        'price',
        'duration_type',
        'duration_value',
        'features',
        'is_featured',
        'sort_order',
        'max_daily_withdrawal',
        'referral_bonus_percent',
        'image',
    ];

    protected $casts = [
        'features' => 'array',           // auto JSON decode/encode
        'active'   => 'boolean',
        'is_featured' => 'boolean',
    ];

    // Optional: helper to check if plan is lifetime
    public function isLifetime(): bool
    {
        return $this->duration_type === 'lifetime' || is_null($this->duration_value);
    }

    // Optional: formatted duration string
    public function getDurationDisplayAttribute(): string
    {
        if ($this->isLifetime()) return 'Lifetime';
        if (!$this->duration_value) return 'Custom';

        return $this->duration_value . ' ' . ucfirst($this->duration_type);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function hasLimits(): bool
    {
        return $this->max_daily_withdrawal !== null;
    }
}
