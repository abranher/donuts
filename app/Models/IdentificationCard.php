<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class IdentificationCard extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'type',
    'identification_number',
  ];

  /**
   * Get the user associated with the IdentificationCard
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function user(): HasOne
  {
    return $this->hasOne(User::class);
  }
}
