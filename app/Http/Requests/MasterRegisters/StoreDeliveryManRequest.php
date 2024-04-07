<?php

namespace App\Http\Requests\MasterRegisters;

use App\Enums\PhoneCode;
use App\Enums\TypeIdentificationCard;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreDeliveryManRequest extends FormRequest
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
      'name' => ['required', 'min:4', 'max:80', 'string'],
      'email' => ['required', 'string', 'email', 'unique:users'],
      'username' => ['required', 'min:4', 'max:20', 'unique:users'],
      'password' => ['required', 'confirmed', Password::defaults()],
      'birth' => ['required', 'date'],
      'type' => ['required', Rule::in(TypeIdentificationCard::options())],
      'identification_number' => ['required', 'min_digits:7', 'max_digits:9', 'numeric', 'unique:identification_cards'],
      'code_phone' => ['required', Rule::in(PhoneCode::options())],
      'phone_number' => ['required', 'numeric', 'min_digits:7', 'max_digits:7'],
      'address' => ['required', 'min:15', 'max:120'],
      'state_id' => ['required', 'numeric'],
      'municipality_id' => ['required', 'numeric'],
      'vehicle_type' => ['required'],
      'plate' => ['required', 'size:7'],
    ];
  }
}
