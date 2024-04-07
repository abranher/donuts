<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class LoginController extends Controller
{
  protected $limit = 2;
  protected $initCounter = 1;
  protected $duration = 2;

  public function index(): View
  {
    return view('auth.login');
  }

  public function login(LoginRequest $request)
  {
    $credentials = $request->getCredentials();
    $user = LoginService::getUser($credentials);

    if (!$user) {
      return to_route('login')->withErrors(['status' => 'Usuario/Email no encontrado']);
    }

    if (!Auth::validate($credentials)) {
      $key = LoginService::createKey($user->id);
      $remaining = Cache::get($key);

      if ($remaining == null) {
        Cache::put($key, $this->initCounter, $this->duration * 60);
        $remaining = $this->initCounter;
      } else {
        Cache::increment($key);
      }

      if ($remaining >= $this->limit) {
        $user->ban();
        return back()->withErrors(['status' => 'Demasiados intentos! Cuenta bloqueada.']);
      }

      return to_route('login')->withErrors(['status' => 'Contraseña incorrecta']);
    }

    $user = Auth::getProvider()->retrieveByCredentials($credentials);

    Auth::login($user, $request->remember == 'on' ? true : false);

    LoginService::clearLoginAttempts($user->id);

    return $this->authenticated($request, $user);
  }

  public function authenticated(Request $request, $user)
  {
    if ($user->hasRole(Role::ADMIN)) {
      return to_route('admin.dashboard');
    } elseif ($user->hasRole(Role::CUSTOMER)) {
      return to_route('home');
    } elseif ($user->hasRole(Role::DELIVERY_MAN)) {
      return to_route('delivery-man.index');
    }
  }
}
