<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'username' => $validatedData['username'],
            'password' => Hash::make ($validatedData['password']),
        ]);
        Auth::login($user);

        return redirect()->route('user.dashboard')->with('success','Registration successful!');
    }

    public function login(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $user = User::where("email",$validatedData['email'])->first();
        if (!$user) {
            return back()->with("error", "No user found");
        }

        $passverify = Hash::check($validatedData['password'],$user->password);
        if (!$passverify) {
            return back()->with("error", "Incorrect password");
        }


        Auth::login($user);

        if ($user->role === "admin") {
            return redirect()->route('admin.dashboard')->with('success', 'login successful!');
        }
        return redirect()->route('user.dashboard')->with('success', 'login successful!');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login')->with('success', 'logged out successfully!');
    }
}
