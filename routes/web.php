<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {

  Route::view('/', 'index')
    ->name('index');

  /**
   * extras.
   */
  Route::view('privacy_policy', 'extras.privacy-policy')
    ->name('privacy.policy');
});

/**
 * Auth Routes 
 */
require __DIR__ . '/auth.php';

/**
 * Admin Routes 
 */
require __DIR__ . '/admin.php';

/**
 * User Routes 
 */
require __DIR__ . '/customer.php';

/**
 * Delivery Man Routes 
 */
require __DIR__ . '/delivery-man.php';


Route::view('/productos', 'shop.productos');

Route::view('/producto', 'shop.producto');

Route::view('notification', 'notification');
Route::view('testemail', 'test');

Route::get('hola', function () {
  // return view('pdf-reports.invoice');
});
