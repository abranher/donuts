<?php

use App\Http\Controllers\DeliveryMen\UserDeliveryManController;
use App\Http\Controllers\User\UserDeliveryController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'logs-out-banned-user'])->group(function () {
  // Dashboard
  Route::post('delivery-man/takeOrder/{delivery_man}', [UserDeliveryManController::class, 'takeOrder'])
    ->name('delivery-man.takeOrder');

  Route::post('delivery-man/finishOrder/{delivery_man}', [UserDeliveryManController::class, 'finishOrder'])
    ->name('delivery-man.finishOrder');

  Route::resource('delivery-man', UserDeliveryManController::class);

  Route::get('user-deliveries', [UserDeliveryController::class, 'index'])
    ->name('user-deliveries.index');
});
