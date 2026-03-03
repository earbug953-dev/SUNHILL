<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Deposit;
use Illuminate\Support\Facades\DB;

class CreditApprovedDeposits extends Command
{
    protected $signature = 'deposits:credit-approved';
    protected $description = 'Credit users for approved deposits that have not yet been credited';

    public function handle()
    {
        $deposits = Deposit::where('status', 'approved')->where('credited', false)->get();
        $count = 0;

        foreach ($deposits as $deposit) {
            DB::transaction(function () use ($deposit, &$count) {
                $user = $deposit->user()->lockForUpdate()->first();
                $user->increment('balance', $deposit->amount);
                $deposit->credited = true;
                $deposit->save();
                $count++;
            });
        }

        $this->info("Processed {$count} deposits.");
        return 0;
    }
}
