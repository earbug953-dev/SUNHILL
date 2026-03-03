<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


    class Withdrawal extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'payment_method',
        'txn_id',
        'status',
        'proof_of_payment',
        'wallet_details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
        // total withdrawals of all user
    public static function totalWithdrawals()
    {
        return self::where('status', 'completed')->sum('amount');
    }
    // pending withdrawals of all user
    public static function pendingWithdrawals()
    {
        return self::where('status', 'processing')->sum('amount');
    }
    // number of pending withdrawals
    public static function pendingWithdrawalsCount()
    {
        return self::where('status', 'processing')->count();
    }

    // today withdrawals
    public static function todayWithdrawals()
    {
        return self::whereDate('created_at', now()->toDateString())->sum('amount');
    }
    // how pecent of withdrawals today vs yesterday
    public static function todayVsYesterday()
    {
        $today = self::whereDate('created_at', now()->toDateString())->sum('amount');
        $yesterday = self::whereDate('created_at', now()->subDay()->toDateString())->sum('amount');
        if ($yesterday == 0) {
            return $today > 0 ? 100 : 0; // If yesterday was 0, return 100% if today has withdrawals, otherwise 0%
        }
        return (($today - $yesterday) / $yesterday) * 100;
    }
    // Avg. Withdrawal
    public static function averageWithdrawal()
    {
        return self::where('status', 'completed')->avg('amount');
    }
    // up from last month
    public static function averageWithdrawalVsLastMonth()
    {
        $currentMonthAvg = self::where('status', 'completed')
            ->whereMonth('created_at', now()->month)
            ->avg('amount');
        $lastMonthAvg = self::where('status', 'completed')
            ->whereMonth('created_at', now()->subMonth()->month)
            ->avg('amount');
        if ($lastMonthAvg == 0) {
            return $currentMonthAvg > 0 ? 100 : 0;
        }
        return (($currentMonthAvg - $lastMonthAvg) / $lastMonthAvg) * 100;

    }
}
