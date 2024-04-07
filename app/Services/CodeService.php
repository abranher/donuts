<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CodeService
{
  /**
   * Check if code exists in table
   */
  public static function checkCodeExists(string $table, $code)
  {
    $existingCode = DB::table($table)->where('code', $code)->first();

    if ($existingCode) return true; // Exists Code
    else return false; // No exists Code
  }

  /**
   * Generate Code
   */
  public static function generateCode(string $table, int $length = 8)
  {
    $code = '#' . Str::random($length);

    $existingCode = self::checkCodeExists($table, $code);

    if ($existingCode) return $code = null;

    return $code;
  }

  /**
   * Get Code
   */
  public static function getCode(string $table)
  {
    $code = null;

    while ($code == null) {
      $code = self::generateCode($table);
    }

    return $code;
  }
}
