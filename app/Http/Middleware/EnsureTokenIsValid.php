<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if ($request->user()->secret_token == null) {
      return to_route('secret_token.create')->with('status', 'Atención!');
    } elseif (!(Hash::check($request->input('token'), $request->user()->secret_token))) {
      return back()->withErrors(['token' => 'Token incorrecto!']);
    }

    return $next($request);
  }
}
