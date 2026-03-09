<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('user.dashboard', absolute: false));
        }

        $request->user()->sendEmailVerificationNotification();
        if ($user->role === "admin") {
            return redirect()->route('admin.dashboard')->with('success', 'login successful!');
        }
        return redirect()->route('user.dashboard')->with('success', 'login successful!');
        return back()->with('status', 'verification-link-sent');
    }
}
