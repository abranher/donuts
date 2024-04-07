<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\EmailUserUnlock;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Tzsk\Otp\Facades\Otp;

class UserUnlockController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('auth.user-unlock');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate(['email' => ['required', 'email']]);
    $user = AuthService::getUser($request->email);

    if (!$user) {
      return to_route('user-unlock.request')->withErrors(['status' => 'Email no encontrado']);
    }

    $otp = Otp::generate($user->email);

    Notification::send($user, new EmailUserUnlock($user, $otp));

    return to_route('unlock-user.reset', ['email' => $user->email])
      ->with(['status' => __('Link to reset user sent!')]);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
