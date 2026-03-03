<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name',
        'min_investment',
        'max_investment',
        'daily_return',
        'duration_days',
        'total_return',
        'description',
        'active'

    ];

    // tolal active package
    public static function activePackages() {
        return self::where('active', true)->count();
    }
    

}
