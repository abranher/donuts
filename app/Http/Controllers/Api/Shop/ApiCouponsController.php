<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponUsage;
use Illuminate\Http\Request;

class ApiCouponsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return response()->json(
      Coupon::all()
    );
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $coupon = Coupon::firstWhere('code', $request->code);

    if ($coupon == null) {
      return response()->json([
        'status' => false,
        'type' => 'warning',
        'message' => 'Este código no existe!',
      ], 404);
    }

    // Comprobar la cantidad de usos por parte del user
    $couponUsage = CouponUsage::where('user_id', $request->user_id)->get();

    if ($coupon->uses <= $couponUsage->count()) {
      return response()->json([
        'status' => false,
        'type' => 'warning',
        'message' => 'Haz superado el límite de usos de este cupón!',
      ], 400);
    }

    CouponUsage::create([
      'coupon_id' => $coupon->id,
      'user_id' => $request->user_id,
    ]);

    return response()->json([
      'status' => true,
      'type' => 'success',
      'data' => $coupon,
      'message' => 'Registro exitoso!'
    ], 200);
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
