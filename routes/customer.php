<?php

use App\Http\Controllers\CustomDonut\RecipeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\User\MyInvoicesController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'logs-out-banned-user'])->group(function () {
  Route::view('home', 'home')->name('home');

  // User Orders
  Route::get('my-invoices', [MyInvoicesController::class, 'index'])
    ->name('my-invoices.index');

  Route::get('my-invoices/{invoice_order}', [MyInvoicesController::class, 'show'])
    ->name('my-invoices.show');

  Route::get('my-invoices/download-pdf/{invoice_order}', [MyInvoicesController::class, 'downloadPDF'])
    ->name('my-invoices.download-pdf');

  // Shop
  Route::get('shop', [ShopController::class, 'index'])->name('shop');

  // Custom Donuts
  Route::resource('recipes', RecipeController::class);
});
