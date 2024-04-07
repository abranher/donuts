<?php

namespace App\Services;

use App\Models\CategoryProduct;
use App\Models\Product;

class ProductCodeService
{

  /**
   * Check if code exists, if return true then exists code, else if return false then no exists code.
   * @return bool
   */
  public static function checkCodeExists(string $code): bool
  {
    $existingCode = Product::where('code', $code)->first();

    if ($existingCode) {
      return true; // Exists Code
    } else {
      return false; // No exists Code
    }
  }

  /**
   * Get the string Prefix
   */
  public static function generateCode($categoryId, $length = 7)
  {
    $numbers = '0123456789';
    $code = '';

    for ($i = 0; $i < $length; $i++) {
      $code .= $numbers[mt_rand(0, strlen($numbers) - 1)];
    }

    $codeFinally = CategoryProduct::find($categoryId)->code . '-' . $code;

    $existingCode = self::checkCodeExists($codeFinally);

    if ($existingCode) return $code = null;

    return $codeFinally;
  }

  /**
   * Get prefix for Category
   */
  public static function getCode($categoryId)
  {
    $code = null;

    while ($code == null) {
      $code = self::generateCode($categoryId);
    }

    return $code;
  }
}
