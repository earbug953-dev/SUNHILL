<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');  // delete transactions if user is deleted
            
            $table->string('tx_ref')->unique()->nullable();     // e.g. payment gateway reference
            $table->string('type')->index();                    // 'deposit', 'withdrawal', 'bonus', 'refund', 'commission', etc.
            $table->decimal('amount', 15, 2);                   // positive = credit, negative = debit (or always positive + type decides)
            $table->string('currency')->default('USD');
            
            $table->string('payment_method')->nullable();       // 'wallet', 'paypal', 'bank', 'crypto', etc.
            $table->string('description')->nullable();
            
            $table->string('status')->default('pending');       // pending, approved, rejected, processing, failed
            $table->text('notes')->nullable();                  // admin notes, rejection reason, etc.
            
            $table->string('proof_image')->nullable();          // path to uploaded proof for deposits/withdrawals
            
            $table->timestamps();
            
            // Optional indexes for faster queries
            $table->index(['user_id', 'type']);
            $table->index('status');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};