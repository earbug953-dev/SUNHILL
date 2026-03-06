<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositsController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WithdrawalController;
use App\Models\Package;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/register',function () {
    return view('register');
});

Route::post('/register',[AuthController::class,'register'])->name('register');

Route::get('/login',function () {
    return view('login');
});

Route::post('/login',[AuthController::class,'login'])->name('login');

Route::post('/logout',[AuthController::class, 'logout'])->name('logout');



Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    Route::get('/deposit', function () {
        return view('user.deposit');
    })->name('user.deposit');

    Route::get('/packages', function () {
    $packages = Package::where('active', true)
        ->orderBy('min_investment', 'asc')
        ->paginate(4);   // ← paginate directly on the query builder

        return view('user.packages', compact('packages'));
    })->name('user.packages');

    Route::get('/profile',[UserController::class,'profile'])->name('user.profile');

    Route::put('/profile/{user}',[UserController::class, 'edit_profile'])->name('edit.profile');
    Route::put('/password/{user}',[UserController::class, 'change_password'])->name('change.password');
    Route::get('/transactions', function () {
    $withdrawals = Withdrawal::where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('user.transaction', compact('withdrawals'));
})->name('user.transactions');
    Route::get('/withdraw', function () {
    $withdrawals = Withdrawal::where('user_id', auth()->id())
        ->latest()
        ->get();
    $users = auth()->user();

    return view('user.withdrawal', compact('withdrawals', 'users'));
})->name('user.withdraw');

    Route::post('/deposit/confirm', [DepositsController::class, 'confirm_deposit'])->name('user.deposit.confirm');

    Route::post('/withdraw', [WithdrawalController::class, 'request_withdrawal'])->name('user.withdraw.request');
});








// admin routes

Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, "index"])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, "users"])->name('admin.users');
    Route::get('/deposits', [AdminController::class, "deposits"])->name('admin.deposits');
    Route::get('/withdrawals', [AdminController::class, "withdrawals"])->name('admin.withdrawals');
    Route::get('/packages', [AdminController::class, "packages"])->name('admin.packages');
    Route::get('/transactions', [AdminController::class, "transactions"])->name('admin.transactions');
    Route::get('/reports', [AdminController::class, "reports"])->name('admin.reports');
    Route::get('/settings', [AdminController::class, "settings"])->name('admin.settings');


    Route::post('/packages/store', [PackagesController::class, "store"])->name('admin.packages.store');

    Route::put('/packages/update/{package}', [PackagesController::class, "update"])->name('admin.packages.update');

    Route::delete('/packages/destroy/{package}', [PackagesController::class, "destroy"])->name('admin.packages.destroy');

    Route::put('/settings/update', [SettingsController::class, "update_settings"])->name('admin.settings.update');

    Route::post('/deposits/approve/{deposit}', [DepositsController::class, 'approve_deposit'])->name('admin.deposits.approve');
    Route::post('/deposits/reject/{deposit}', [DepositsController::class, 'reject_deposit'])->name('admin.deposits.reject');

    Route::post('/withdrawals/cancel/{withdrawal}',
    [WithdrawalController::class, 'cancel_withdrawal'])
    ->name('admin.withdrawals.cancel');
    Route::post('/withdrawals/approve/{withdrawal}',
    [WithdrawalController::class, 'approve_withdrawal'])
    ->name('admin.withdrawal.approve');
});
