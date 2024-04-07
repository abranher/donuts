<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PromotionalProduct extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'promotion_id',
    'product_id',
  ];

  /**
   * Get the promotion that owns the PromotionalProduct
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function promotion(): BelongsTo
  {
    return $this->belongsTo(Promotion::class);
  }

  /**
   * Get the product that owns the PromotionalProduct
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class);
  }
}
