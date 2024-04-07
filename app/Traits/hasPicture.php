<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait hasPicture
{
  /**
   * Return a url for product.
   *
   * @param int $lenght
   */
  public function getPictureUrlProductAttribute(): string
  {
    return Storage::disk('products')->url($this->image);
  }

  /**
   * Return a url for product.
   *
   * @param int $lenght
   */
  public function getPictureUrlUserAttribute(): string
  {
    return Storage::disk('images_profile')->url($this->image_profile);
  }

  /**
   * Return a url for product.
   *
   * @param int $lenght
   */
  public function getPictureUrlADAttribute(): string
  {
    return Storage::disk('advertisements')->url($this->image);
  }
}
