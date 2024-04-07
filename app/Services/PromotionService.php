<?php

namespace App\Services;

use App\Models\Promotion;

class PromotionService
{
  public static function getLatest()
  {
    $promotion = Promotion::latest('end_date')->first();

    return $promotion;
  }
}
