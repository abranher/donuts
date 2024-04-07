<?php

namespace App\Http\Requests\Promotions;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromotionRequest extends FormRequest
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
      'title' => ['required', 'min:15', 'max:60'],
      'description' => ['required', 'min:30', 'max:200'],
      'start_date' => ['required', 'date'],
      'end_date' => ['required', 'date'],
      'discount' => ['required', 'numeric', 'integer'],
    ];
  }
}
