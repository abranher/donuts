<?php

namespace App\Http\Requests\Coupons;

use Illuminate\Foundation\Http\FormRequest;

class StoreCouponRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'code' => ['required', 'string', 'min:5', 'max:15', 'unique:coupons'],
      'discount' => ['required', 'numeric', 'integer'],
      'expires_at' => ['required', 'date'],
      'uses' => ['required', 'numeric', 'max_digits:3'],
    ];
  }
}
