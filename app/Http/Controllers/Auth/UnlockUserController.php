<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Tzsk\Otp\Facades\Otp;

class UnlockUserController extends Controller
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
  public function create(Request $request): View
  {
    return view('auth.enter-key');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'key' => ['required'],
      'email' => ['required', 'email'],
    ]);

    $valid = Otp::match($request->key, $request->email);

    if (!$valid) {
      return to_route('user-unlock.request')
        ->with('status', 'Lo sentimos, la clave que ha introducido es incorrecta o ha expirado. Por favor, solicite una nueva clave.');
    }

    $user = AuthService::getUser($request->email);
    $user->unban();

    return to_route('login')->with('status', 'Usuario Desbloqueado!');
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
