<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{

    protected $fillable = [
        'tx_ref',
        'user_id',
        'amount',
        'payment_method',
        'proof_of_payment',
        'status',
        'credited', // added
    ];
    protected $casts = [
        'submitted_at' => 'datetime',
        'credited' => 'boolean', // added
    ];

    public function user()
    {
        return $this->belongsTo(User::class);   // ← this line is missing or commented out
        // or if foreign key is not 'user_id':
        // return $this->belongsTo(User::class, 'user_id', 'id');
    }




    protected static function boot()
    {
        parent::boot();

        static::creating(function ($deposit) {
            $deposit->tx_ref = 'DEP-' . strtoupper(Str::random(10));
        });
    }
    // total deposits of all user
    public static function totalDeposits()
    {
        return self::where('status', 'approved')->sum('amount');
    }

    // total deposits of all user made today
    public static function totalDepositsToday()
    {
        return self::where('status', 'approved')
            ->whereDate('created_at', now()->toDateString())
            ->sum('amount');
    }

    // recent deposits of all user
    public static function recentDeposits()
    {
        return self::where('status', 'approved')
            ->latest()
            ->get();
    }
    // time of the newest deposit in human readable format like 5 minutes ago, 2 hours ago, etc.
    public function createdAtHuman()
    {
        return \Carbon\Carbon::parse($this->created_at)->diffForHumans();
    }

    // sum my deposits and add to the users balance when the deposit is approved and update the deposit status to approved i have approved some deposit in the admin panel i want all of those deposits to be added to the users balance and the deposit status to be updated to approved


}
