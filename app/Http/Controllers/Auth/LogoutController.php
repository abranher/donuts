<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
  public function logout(Request $request, User $user)
  {
    $user->last_conection = date('d-m-Y - h:i:s a');
    $user->save();

    Session::flush();

    Auth::logout();

    // no basta solo con hacer el logout sino que tambien hay que regenerar la sesion
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return to_route('login');
  }
}
