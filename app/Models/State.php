<?php

namespace App\Models;

use App\Traits\BaseSelect;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
  use HasFactory, BaseSelect;

  /**
   * Get all of the municipalities for the State
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function municipalities(): HasMany
  {
    return $this->hasMany(Municipality::class);
  }

  /**
   * Get all of the addresses for the State
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function addresses(): HasMany
  {
    return $this->hasMany(Address::class);
  }
}
