<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ImageProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SecretTokenController;
use App\Http\Controllers\Auth\UnlockUserController;
use App\Http\Controllers\Auth\UserUnlockController;
use Illuminate\Support\Facades\Route;

/**
 * sign up.
 */
Route::group(['prefix' => 'signup', 'middleware' => 'guest'], function () {
  Route::get('/', [RegisterController::class, 'index'])
    ->name('signup');
  Route::post('/register', [RegisterController::class, 'register'])
    ->name('signup.register');
});

/**
 * Log in.
 */
Route::group(['prefix' => 'login', 'middleware' => 'guest'], function () {
  Route::get('/', [LoginController::class, 'index'])
    ->name('login');
  Route::post('sign-in', [LoginController::class, 'login'])
    ->name('login.sign-in');
});

/**
 * Log out.
 */
Route::group(['prefix' => 'logout', 'middleware' => 'auth'], function () {
  Route::post('/{user}', [LogoutController::class, 'logout'])
    ->name('logout');
});

/**
 * Email verification.
 */
Route::middleware(['auth'])->group(function () {

  Route::get('/email/verify', [EmailVerificationController::class, 'create'])
    ->name('verification.notice');

  Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'store'])
    ->middleware(['signed'])
    ->name('verification.verify');

  Route::post('/email/verification-notification', [EmailVerificationController::class, 'update'])
    ->middleware(['throttle:6,1'])
    ->name('verification.send');
});

/**
 * Reset password.
 */
Route::middleware(['guest'])->group(function () {

  // Forgot password
  Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

  Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

  Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

  Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update');

  // User unlock
  Route::get('/user-unlock', [UserUnlockController::class, 'create'])
    ->name('user-unlock.request');

  Route::post('/user-unlock', [UserUnlockController::class, 'store'])
    ->name('user-unlock.email');

  Route::get('/unlock-user', [UnlockUserController::class, 'create'])
    ->name('unlock-user.reset');

  Route::post('/unlock-user', [UnlockUserController::class, 'store'])
    ->name('unlock-user.update');
});

/**
 * Profile.
 */
Route::group(['prefix' => 'profile', 'middleware' => ['auth', 'verified']], function () {

  Route::controller(ProfileController::class)->group(function () {
    Route::get('/', 'show')
      ->name('profile.show');
    Route::post('edit', 'edit')
      ->middleware('secret_token')
      ->name('profile.edit');
    Route::match(['put', 'patch'], '/', 'update')
      ->name('profile.update');
  });

  Route::post('change_image_profile', ImageProfileController::class)->name('profile.changeImage');

  Route::get('/secret_token', [SecretTokenController::class, 'create'])->name('secret_token.create');
  Route::post('/secret_token', [SecretTokenController::class, 'store'])->name('secret_token.store');
});
