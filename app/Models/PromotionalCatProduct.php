<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PromotionalCatProduct extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'promotion_id',
    'category_product_id',
  ];

  /**
   * Get the promotion that owns the PromotionalCatProduct
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function promotion(): BelongsTo
  {
    return $this->belongsTo(Promotion::class);
  }

  /**
   * Get the categoryProduct that owns the PromotionalCatProduct
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function categoryProduct(): BelongsTo
  {
    return $this->belongsTo(CategoryProduct::class);
  }
}
