<?php

namespace App\Models;

use App\Traits\hasStock;
use App\Traits\Paginable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RawMaterial extends Model
{
  use HasFactory, Paginable, hasStock;

  protected $fillable = [
    'code',
    'name',
    'description',
    'price',
    'unit',
    'amount_per_donut',
    'min_stock',
    'max_stock',
    'image',
    'model',
    'category_raw_material_id',
  ];

  public static function getAll()
  {
    return self::with('categoryRawMaterial')->get()->each(function ($item) {
      $item->sale_price = number_format($item->price + $item->price * 0.16, 2);
    });
  }

  /**
   * Get the category that owns the RawMaterial
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function categoryRawMaterial(): BelongsTo
  {
    return $this->belongsTo(CategoryRawMaterial::class);
  }

  /**
   * Get all of the stocks for the RawMaterial
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function stocks(): HasMany
  {
    return $this->hasMany(StockRawMaterial::class);
  }
}
