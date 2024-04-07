<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delivery extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'invoice_order_id',
    'delivery_man_id',
    'status',
  ];

  /**
   * Get the invoiceOrder that owns the Delivery
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function invoiceOrder(): BelongsTo
  {
    return $this->belongsTo(InvoiceOrder::class);
  }

  /**
   * Get the deliveryMan that owns the Delivery
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function deliveryMan(): BelongsTo
  {
    return $this->belongsTo(DeliveryMan::class);
  }
}
