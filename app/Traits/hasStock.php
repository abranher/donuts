<?php

namespace App\Traits;

use App\Enums\StockStatus;

trait hasStock
{
  public static function getStocks()
  {
    return self::with(['stocks' => function ($q) {
      $q->where('status', StockStatus::AVAILABLE->value);
    }])->get()->each(function ($item) {
      $item->stock = $item->stocks->count();
      $item->percent = (($item->stock - $item->min_stock) / ($item->max_stock - $item->min_stock)) * 100;
      unset($item['stocks']);
    });
  }
}
