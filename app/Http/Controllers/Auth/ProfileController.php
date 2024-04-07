<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
  /**
   * Show the form for creating the resource.
   */
  public function create(): never
  {
    abort(404);
  }

  /**
   * Store the newly created resource in storage.
   */
  public function store(Request $request): never
  {
    abort(404);
  }

  /**
   * Display the resource.
   */
  public function show(): View
  {
    return view('profile.show');
  }

  /**
   * Show the form for editing the resource.
   */
  public function edit(): View
  {
    return view('profile.edit');
  }

  /**
   * Update the resource in storage.
   */
  public function update(Request $request)
  {
    //
  }

  /**
   * Remove the resource from storage.
   */
  public function destroy(): never
  {
    abort(404);
  }
}
