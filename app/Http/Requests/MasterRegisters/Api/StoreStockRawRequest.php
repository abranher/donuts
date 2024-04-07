<?php

namespace App\Http\Requests\MasterRegisters\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreStockRawRequest extends FormRequest
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
      '*.raw_material_id' => ['required'],
      '*.quantity' => ['required'],
      '*.expires_at' => ['required'],
    ];
  }
}
