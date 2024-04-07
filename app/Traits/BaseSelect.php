<?php

namespace App\Traits;

trait BaseSelect
{
  public static function forSelect()
  {
    return self::all()->map(fn ($model) => [
      'value' => $model->id,
      'label' => $model->name,
    ]);
  }
}
