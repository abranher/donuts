<?php

namespace App\Http\Controllers\Api\Geolocation;

use App\Http\Controllers\Controller;
use App\Models\Geolocation;
use App\Models\User;
use Illuminate\Http\Request;

class ApiGeolocationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $user = User::find($request->user_id);
    $user->geolocation->update($request->all());

    return success('Successful registration', $user);
  }

  /**
   * Display the specified resource.
   */
  public function show(Geolocation $geolocation)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Geolocation $geolocation)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Geolocation $geolocation)
  {
    //
  }
}
