<?php

namespace App\Enums;

use App\Traits\BaseEnum;

enum StockStatus: string
{
  use BaseEnum;

  case AVAILABLE = 'AVAILABLE';
  case SOLD = 'SOLD';

  public static function translation()
  {
    return [
      'AVAILABLE' => 'DISPONIBLE',
      'SOLD' => 'VENDIDO',
    ];
  }
}
