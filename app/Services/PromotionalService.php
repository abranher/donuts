<?php

namespace App\Services;

use App\Models\PromotionalCatProduct;
use App\Models\PromotionalProduct;

class PromotionalService
{
  public static function getPromotionalCat($promotionId, $categoryProductId)
  {
    $promotional = PromotionalCatProduct::where('promotion_id', $promotionId)
      ->where('category_product_id', $categoryProductId)
      ->get();

    return $promotional;
  }

  public static function getPromotionalPro($promotionId, $productId)
  {
    $promotional = PromotionalProduct::where('promotion_id', $promotionId)
      ->where('product_id', $productId)
      ->get();

    return $promotional;
  }
}
