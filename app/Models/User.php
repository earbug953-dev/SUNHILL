<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'phone',
        'password',
        'role',
        'active',
        'balance',
        'last_seen',
        'site_url', // ADD THIS
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_seen' => 'datetime', // ADD THIS
        ];
    }

    // how many users this week apart from admin
    public static function newUsersThisWeek() {
        return self::where('role', '!=', 'admin')->where('created_at', '>=', now()->subWeek())->count();
    }

    // total users apart from admin
    public static function totalUsers() {
        return self::where('role', '!=', 'admin')->count();
    }

    // newest users apart from admin
    public static function newestUsers() {
        return self::where('role', '!=', 'admin')->latest()->take(5)->get();
    }

    public function isOnline()
    {
        return $this->last_seen && $this->last_seen->gt(now()->subMinutes(5));
    }

    // total blance of all users apart from admin
    public static function totalUserBalance() {
        return self::where('role', '!=', 'admin')->sum('balance');
    }

    // active users apart from admin
    public static function activeUsers() {
        return self::where('role', '!=', 'admin')->where('active', true)->count();
    }

    // total blance of a user
    public function totalBalance() {
        return $this->balance;
    }

    // total users online apart from admin
    public static function onlineUsers() {
        return self::where('role', '!=', 'admin')->where('last_seen', '>=', now()->subMinutes(5))->count();
    }

    // total percentage of online users apart from admin
    public static function onlinePercentage() {
        $total = self::where('role', '!=', 'admin')->count();
        $online = self::onlineUsers();
        return $total > 0 ? ($online / $total * 100) : 0;
    }
    // number of offline users apart from admin
    public static function inactiveUsers() {
        return self::where('role', '!=', 'admin')
            ->where(function ($query) {
                $query->whereNull('last_seen')
                    ->orWhere('last_seen', '<', now()->subMinutes(5));
            })
            ->count();
    }
    // total percentage of offline users apart from admin
    public static function inactivePercentage() {
        $total = self::where('role', '!=', 'admin')->count();
        $inactive = self::inactiveUsers();
        return $total > 0 ? ($inactive / $total * 100) : 0;
    }

    // time since last seen in human readable format like 5 minutes ago, 2 hours ago, etc.
    public function lastSeenHuman()
    {
        if (!$this->last_seen) {
            return 'Never';
        }

        return \Carbon\Carbon::parse($this->last_seen)->diffForHumans();
    }
    // time of new user registration in human readable format like 5 minutes ago, 2 hours ago, etc.
    public function createdAtHuman()
    {
        return \Carbon\Carbon::parse($this->created_at)->diffForHumans();
    }

public function transactions()
{
    return $this->hasMany(Transaction::class);
}
}
