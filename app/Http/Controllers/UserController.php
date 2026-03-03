<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();

        $totalDeposits = Deposit::where('user_id', $user->id)
            ->where('status', 'approved')
            ->sum('amount');

        // or use the scope/method if you prefer
        // $totalDeposits = Deposit::totalDepositsForUser($user->id);

        return view('user.dashboard', compact('user', 'totalDeposits'));
    }
    public function profile() {
        $user = User::where('id',Auth::id())->first();
        return view('user.profile', compact('user'));
    }

    public function edit_profile(Request $request, User $user) {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'phone' => 'required|string|max:255'
        ]);
        $user = User::where('id', $user->id)->first();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->update();

        return back()->with('success', 'Profile Updated Successfully!');
    }


    public function change_password(Request $request, User $user){
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:8|confirmed',
    ]);

    // Check if current password is correct
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->with('error', 'Current password is incorrect.');
    }

    // Update password (ALWAYS hash password)
    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('success', 'Password updated successfully.');
}
}
