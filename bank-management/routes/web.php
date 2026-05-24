<?php

use App\Http\Controllers\BankAccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('bank-accounts.index'));

Route::prefix('bank-accounts')->name('bank-accounts.')->group(function () {
    Route::get('/',       [BankAccountController::class, 'index'])->name('index');
    Route::get('/create', [BankAccountController::class, 'create'])->name('create');
    Route::post('/',      [BankAccountController::class, 'store'])->name('store');
});
