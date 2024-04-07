<?php

namespace App\Models;

use App\Enums\StockStatus;
use App\Traits\hasPicture;
use App\Traits\hasStock;
use App\Traits\Paginable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
  use HasFactory, Paginable, hasPicture, hasStock;

  protected $fillable = [
    'code',
    'name',
    'description',
    'price',
    'size',
    'min_stock',
    'max_stock',
    'image',
    'image_2',
    'image_3',
    'hidden',
    'category_product_id'
  ];

  /**
   * Get all of the stocks for the Product
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function stocks(): HasMany
  {
    return $this->hasMany(StockProduct::class);
  }

  /**
   * Get the categoryProduct that owns the Product
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function categoryProduct(): BelongsTo
  {
    return $this->belongsTo(CategoryProduct::class);
  }

  /**
   * Get all of the promotionalProducts for the Product
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function promotionalProducts(): HasMany
  {
    return $this->hasMany(PromotionalProduct::class);
  }

  /**
   * The promotions that belong to the Product
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function promotions(): BelongsToMany
  {
    return $this->belongsToMany(Promotion::class, 'promotional_products');
  }

  /**
   * Get all of the productValorations for the Product
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function productValorations(): HasMany
  {
    return $this->hasMany(ProductValoration::class);
  }

  public static function getAll()
  {
    return self::with(['categoryProduct', 'promotions', 'stocks' => function ($q) {
      $q->where('status', StockStatus::AVAILABLE);
    }])->get()
      ->each(function ($item) {
        $item->sale_price = round($item->price + $item->price * 0.16, 2);
        $item->stock = $item->stocks->count();
        $item->available = ($item->stock - $item->min_stock) < 0 ? 0 : $item->stock - $item->min_stock;
        unset($item['stocks']);
      });
  }
}
