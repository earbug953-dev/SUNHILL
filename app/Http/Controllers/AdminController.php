<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Package;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $user = auth()->user();
        $deposit = Deposit::totalDeposits();
        return view('admin.dashboard', compact('user', 'deposit'));
    }

    public function users() {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.users', compact('users'));
    }

    public function deposits()
    {
        $deposits = Deposit::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', '!=', 'admin');
            })
            ->latest()
            ->paginate(10);

        return view('admin.deposits', compact('deposits'));
    }

    public function withdrawals() {
        $withdrawals = Withdrawal::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', '!=', 'admin');
            })
            ->latest()
            ->paginate(10);
        return view('admin.withdrawals', compact('withdrawals'));
    }

    public function packages()
    {
        $packages = Package::orderBy('min_investment', 'asc')->paginate(3);

        return view('admin.packages', compact('packages'));
    }

    public function transactions() {
        return view('admin.transactions');
    }

    public function reports() {
        return view('admin.reports');
    }

    public function settings() {
        $user = User::where('id',Auth::id())->first();
        return view('admin.settings', compact('user'));
    }
}
