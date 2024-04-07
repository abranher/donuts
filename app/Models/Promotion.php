<?php

namespace App\Models;

use App\Traits\Paginable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Promotion extends Model
{
  use HasFactory, Paginable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'title',
    'description',
    'start_date',
    'end_date',
    'discount',
  ];

  /**
   * Get the advertisement associated with the Promotion
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function advertisement(): HasOne
  {
    return $this->hasOne(Advertisement::class);
  }

  /**
   * Get all of the promotionalProducts for the Promotion
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function promotionalProducts(): HasMany
  {
    return $this->hasMany(PromotionalProduct::class);
  }

  /**
   * Get all of the promotionalCatProducts for the Promotion
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function promotionalCatProducts(): HasMany
  {
    return $this->hasMany(PromotionalCatProduct::class);
  }

  /**
   * The products that belong to the Promotion
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function products(): BelongsToMany
  {
    return $this->belongsToMany(Product::class, 'promotional_products');
  }

  /**
   * The categoryProducts that belong to the Promotion
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function categoryProducts(): BelongsToMany
  {
    return $this->belongsToMany(CategoryProduct::class, 'promotional_cat_products');
  }
}
