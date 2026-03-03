<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Deposit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BackfillApprovedDeposits extends Command
{
    protected $signature = 'deposits:backfill-approved';
    protected $description = 'One-time: Credit balances for old approved deposits that were not yet marked as credited';

    public function handle()
    {
        $this->info('Starting backfill of approved deposits...');

        $deposits = Deposit::where('status', 'approved')
            ->where('credited', false)
            ->with('user')
            ->get();

        if ($deposits->isEmpty()) {
            $this->info('No eligible deposits found. Nothing to do.');
            return self::SUCCESS;
        }

        $count = 0;

        foreach ($deposits as $deposit) {
            try {
                DB::transaction(function () use ($deposit, &$count) {
                    if (!$deposit->user) {
                        Log::warning("Deposit #{$deposit->id} has no user → skipping");
                        return;
                    }

                    $user = $deposit->user()->lockForUpdate()->first();

                    $user->increment('balance', $deposit->amount);

                    $deposit->credited = true;
                    $deposit->saveQuietly(); // avoid triggering observers if any

                    $count++;
                });

                $this->info("Credited deposit #{$deposit->id} → \${$deposit->amount} to user #{$deposit->user_id}");
            } catch (\Exception $e) {
                $this->error("Failed to credit deposit #{$deposit->id}: " . $e->getMessage());
                Log::error("Backfill failed for deposit #{$deposit->id}", ['error' => $e->getMessage()]);
            }
        }

        $this->info("Backfill complete. Processed {$count} deposits.");
        return self::SUCCESS;
    }
}
