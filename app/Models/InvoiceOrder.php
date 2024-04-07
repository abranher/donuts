<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InvoiceOrder extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'code',
    'user_id',
    'total',
    'discount',
    'payment_method',
    'payment_reference',
    'status',
  ];

  /**
   * Get the user that owns the InvoiceOrder
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get all of the invoiceOrderProDescriptions for the InvoiceOrder
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function invoiceOrderProDescriptions(): HasMany
  {
    return $this->hasMany(InvoiceOrderProDescription::class);
  }

  /**
   * Get all of the invoiceOrderRecDescriptions for the InvoiceOrder
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function invoiceOrderRecDescriptions(): HasMany
  {
    return $this->hasMany(InvoiceOrderRecDescription::class);
  }

  /**
   * Get the delivery associated with the InvoiceOrder
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function delivery(): HasOne
  {
    return $this->hasOne(Delivery::class);
  }

  /**
   * The deliveryMen that belong to the InvoiceOrder
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function deliveryMen(): BelongsToMany
  {
    return $this->belongsToMany(DeliveryMan::class, 'deliveries');
  }

  /**
   * The products that belong to the InvoiceOrder
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function products(): BelongsToMany
  {
    return $this->belongsToMany(Product::class, 'invoice_order_pro_descriptions');
  }

  /**
   * The recipes that belong to the InvoiceOrder
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function recipes(): BelongsToMany
  {
    return $this->belongsToMany(Recipe::class, 'invoice_order_rec_descriptions');
  }
}
