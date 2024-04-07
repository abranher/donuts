<?php

namespace App\Http\Requests\CustomDonut;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipeRequest extends FormRequest
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
      'name' => ['required', 'min:4', 'max:60'],
      'description' => ['sometimes'],
      'glazed' => ['required', 'numeric'],
      'topping' => ['required', 'numeric'],
    ];
  }
}
