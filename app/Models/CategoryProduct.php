<?php

namespace App\Models;

use App\Traits\Paginable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryProduct extends Model
{
  use HasFactory, Paginable;

  protected $fillable = [
    'code',
    'name',
  ];

  /**
   * Get all of the products for the CategoryProduct
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function products(): HasMany
  {
    return $this->hasMany(Product::class);
  }

  /**
   * Get all of the promotionalCatProducts for the CategoryProduct
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function promotionalCatProducts(): HasMany
  {
    return $this->hasMany(PromotionalCatProduct::class);
  }

  /**
   * The promotions that belong to the CategoryProduct
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function promotions(): BelongsToMany
  {
    return $this->belongsToMany(Promotion::class, 'promotional_cat_products');
  }
}
