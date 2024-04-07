<?php

namespace App\Models;

use App\Traits\Paginable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coupon extends Model
{
  use HasFactory, Paginable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'code',
    'discount',
    'expires_at',
    'uses',
  ];

  /**
   * Get all of the couponUsages for the Coupon
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function couponUsages(): HasMany
  {
    return $this->hasMany(CouponUsage::class);
  }
}
