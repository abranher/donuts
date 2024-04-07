<?php

namespace App\Http\Controllers\Promotions;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Coupons\StoreCouponRequest;
use App\Http\Requests\Coupons\UpdateCouponRequest;
use App\Models\Coupon;
use App\Models\User;
use App\Notifications\DiscountCoupon;
use App\Services\CouponService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;

class CouponController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('coupons.index', [
      'coupons' => Coupon::pag(),
    ]);
  }

  /**
   * Display a listing of the resource.
   */
  public function send(Coupon $coupon): RedirectResponse
  {
    $users = User::role(Role::CUSTOMER->value)->get();

    Notification::send($users, new DiscountCoupon($coupon));

    return to_route('coupons.index')->with('status', 'Cupón enviado exitosamente!');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('coupons.create', [
      'coupon' => CouponService::getLatest(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreCouponRequest $request): RedirectResponse
  {
    Coupon::create(
      $request->safe()
        ->merge(['discount' => $request->discount / 100])
        ->all()
    );

    return to_route('coupons.index')->with('status', 'Cupón creado exitosamente!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Coupon $coupon)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Coupon $coupon): View
  {
    $coupon->discount = $coupon->discount * 100;

    return view('coupons.edit', [
      'coupon' => $coupon,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateCouponRequest $request, Coupon $coupon)
  {
    $coupon->update(
      $request->safe()
        ->merge(['discount' => $request->discount / 100])
        ->all()
    );

    return to_route('coupons.index')->with('status', 'Cupón actualizado exitosamente!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Coupon $coupon)
  {
    //
  }
}
