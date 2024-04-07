<?php

namespace App\Http\Requests\MasterRegisters;

use App\Models\CategoryProduct;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
    $categories = CategoryProduct::all(['id'])->pluck('id');

    return [
      'name' => ['required', 'string', 'min:4', 'max:60'],
      'description' => ['required', 'min:30', 'max:200', 'string'],
      'price' => ['required', 'numeric'],
      'size' => ['required', 'string'],
      'min_stock' => ['required', 'numeric'],
      'max_stock' => ['required', 'numeric'],
      'image' => ['sometimes', 'image'],
      'category_product_id' => ['required', 'numeric', Rule::in($categories)],
    ];
  }
}
