<?php

namespace App\Http\Controllers\Api\Deliveries;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiDeliveryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function indexDeliveryMan()
  {
    $users = User::role(Role::DELIVERY_MAN->value)->get()->each(function ($item) {
      $item->geolocation;
    });

    return success("Sending Delivery Men", $users);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
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
