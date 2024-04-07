<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationController extends Controller
{
  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('auth.verify-email');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(EmailVerificationRequest $request): RedirectResponse
  {
    $request->fulfill();

    return to_route('home');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request): RedirectResponse
  {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', __('A fresh verification link has been sent to your email address.'));
  }
}
