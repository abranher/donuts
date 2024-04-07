<?php

namespace App\Models;

use App\Traits\hasPicture;
use App\Traits\Paginable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableInterface;
use Cog\Laravel\Ban\Traits\Bannable;

class User extends Authenticatable implements MustVerifyEmail, BannableInterface
{
  use HasApiTokens, HasFactory, Notifiable, HasRoles, Paginable, hasPicture, Bannable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'username',
    'password',
    'birth',
    'identification_card_id',
    'phone_id',
    'address_id',
    'secret_token',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  /**
   * Get the geolocation associated with the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function geolocation(): HasOne
  {
    return $this->hasOne(Geolocation::class);
  }

  /**
   * Get the identification_card that owns the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function identificationCard(): BelongsTo
  {
    return $this->belongsTo(IdentificationCard::class);
  }

  /**
   * Get the phone that owns the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function phone(): BelongsTo
  {
    return $this->belongsTo(Phone::class);
  }

  /**
   * Get the address that owns the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function address(): BelongsTo
  {
    return $this->belongsTo(Address::class);
  }

  /**
   * Get all of the recipes for the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function recipes(): HasMany
  {
    return $this->hasMany(Recipe::class);
  }

  /**
   * Get the deliveryMan associated with the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function deliveryMan(): HasOne
  {
    return $this->hasOne(DeliveryMan::class);
  }

  /**
   * Get all of the invoiceOrders for the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function invoiceOrders(): HasMany
  {
    return $this->hasMany(InvoiceOrder::class);
  }

  /**
   * Get all of the auditLogs for the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function auditLogs(): HasMany
  {
    return $this->hasMany(AuditLog::class);
  }
}
