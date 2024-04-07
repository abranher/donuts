<?php

namespace App\Http\Requests\Promotions;

use App\Models\Promotion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdvertisementRequest extends FormRequest
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
    $promotions = Promotion::all(['id'])->pluck('id');

    return [
      'title' => ['required', 'string', 'min:4', 'max:60'],
      'description' => ['required', 'min:30', 'max:200', 'string'],
      'image' => ['required', 'image'],
      'promotion_id' => ['required', 'numeric', Rule::in($promotions)],
    ];
  }
}
