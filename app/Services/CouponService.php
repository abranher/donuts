<?php

namespace App\Services;

use App\Models\Coupon;

class CouponService
{
  public static function getLatest()
  {
    $coupon = Coupon::latest('expires_at')->first();

    return $coupon;
  }
}
