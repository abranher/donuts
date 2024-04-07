<?php

namespace App\Services;

use App\Models\CategoryProduct;
use Illuminate\Support\Str;

class CategoryPrefixService
{
  /**
   * Check if prefix exists, if return true then exists code, else if return false then no exists code.
   * @return bool
   */
  public static function checkPrefixExists(string $code): bool
  {
    $existingPrefix = CategoryProduct::where('code', $code)->first();

    if ($existingPrefix) return true; // Exists Code
    else return false; // No exists Code
  }

  /**
   * Get the string Prefix
   * @return string|bool
   */
  public static function generatePrefix()
  {
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $code = '';

    for ($i = 0; $i < 3; $i++) {
      $code .= $letters[mt_rand(0, strlen($letters) - 1)];
    }

    for ($i = 0; $i < 3; $i++) {
      $code .= $numbers[mt_rand(0, strlen($numbers) - 1)];
    }

    $existingPrefix = self::checkPrefixExists($code);

    if ($existingPrefix) return $code = null;

    return $code;
  }

  /**
   * Get prefix for Category
   */
  public static function getPrefix()
  {
    $code = null;

    while ($code == null) {
      $code = self::generatePrefix();
    }

    return $code;
  }
}
