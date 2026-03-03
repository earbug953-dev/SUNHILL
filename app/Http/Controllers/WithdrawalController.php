<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WithdrawalController extends Controller
{
    public function request_withdrawal(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:50',
        'payment_method' => 'required|string',
        'wallet_details' => 'required|string',
    ]);

    $user = auth()->user();

    if ($request->amount > $user->balance) {
        return back()->with('error', '❌ Insufficient balance. Please check your available funds.');
    }

    $txnId = 'WIT-' . strtoupper(Str::random(10));

    try {

        Withdrawal::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'wallet_details' => $request->wallet_details,
            'txn_id' => $txnId,
            'status' => 'processing',
        ]);

        // Deduct balance
        $user->balance -= $request->amount;
        $user->save();

        return back()->with('success', '✅ Withdrawal request submitted successfully! Transaction ID: ' . $txnId);

    } catch (\Exception $e) {

        return back()->with('error', '❌ Something went wrong. Please try again.');
    }
}

public function cancel_withdrawal(Withdrawal $withdrawal)
{
    if ($withdrawal->status !== 'processing') {
        return back()->with('error', 'Withdrawal already processed.');
    }

    $user = $withdrawal->user;

    // Return balance
    $user->balance += $withdrawal->amount;
    $user->save();

    $withdrawal->status = 'cancelled';
    $withdrawal->save();

    return back()->with('success', 'Withdrawal cancelled and balance refunded.');
}

public function approve_withdrawal(Withdrawal $withdrawal)
{
    if ($withdrawal->status !== 'processing') {
        return back()->with('error', 'Withdrawal already processed.');
    }

    $withdrawal->status = 'completed';
    $withdrawal->save();

    return back()->with('success', 'Withdrawal approved successfully.');
}


}
