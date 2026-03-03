<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function update_settings(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'site_url' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $user->update([
            'email' => $request->email,
            'name' => $request->name,
            'username' => $request->username,
            'site_url' => $request->site_url,
        ]);

        return back()->with('success', 'Profile Updated Successfully!');
    }
}
