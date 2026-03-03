<?php

namespace App\Http\Controllers;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DepositsController extends Controller
{
    public function confirm_deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:50',
            'payment_method' => 'required|string',
            'proof_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $proofPath = null;

        if ($request->hasFile('proof_image')) {
            $proofPath = $request->file('proof_image')->store('proofs', 'public');
        }

        Deposit::create([
            'tx_ref' => 'DEP-' . strtoupper(Str::random(10)),
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'proof_of_payment' => $proofPath,
            'status' => 'pending',
        ]);
        // to input error message if the payment went wrong
        // return back()->with('error', 'There was an issue with your deposit. Please try again.');


        return back()->with('success', 'Deposit submitted successfully check your transactions for updates.');
    }





    // ...existing code...

    public function approve_deposit(Deposit $deposit)
    {
        if ($deposit->status === 'approved' && $deposit->credited) {
            return back()->with('info', 'Deposit already approved and credited.');
        }

        DB::transaction(function () use ($deposit) {
            // lock user row to avoid race conditions
            $user = $deposit->user()->lockForUpdate()->first();

            // mark approved
            $deposit->status = 'approved';

            // credit once
            if (!$deposit->credited) {
                $user->increment('balance', $deposit->amount);
                $deposit->credited = true;
            }

            $deposit->save();
        });

        return back()->with('success', 'Deposit approved and user balance updated.');
    }




    public function reject_deposit(Deposit $deposit)
    {
        $deposit->update(['status' => 'rejected']);
        return back()->with('success', 'Deposit rejected successfully.');
    }
}
