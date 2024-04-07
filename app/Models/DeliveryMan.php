<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeliveryMan extends Model
{
  use HasFactory;

  protected $fillable = [
    'vehicle_type',
    'plate',
    'user_id',
  ];

  /**
   * Get the user that owns the DeliveryMan
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get all of the deliveries for the DeliveryMan
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function deliveries(): HasMany
  {
    return $this->hasMany(Delivery::class);
  }

  /**
   * The invoiceOrders that belong to the DeliveryMan
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function invoiceOrders(): BelongsToMany
  {
    return $this->belongsToMany(InvoiceOrder::class, 'deliveries');
  }
}
