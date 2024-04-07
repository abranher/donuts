<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Role;
use App\Enums\PhoneCode;
use App\Enums\TypeIdentificationCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Address;
use App\Models\Geolocation;
use App\Models\IdentificationCard;
use App\Models\Municipality;
use App\Models\Phone;
use App\Models\State;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
  public function index(): View
  {
    return view('auth.register', [
      'typeIdentificationCard' => TypeIdentificationCard::options(),
      'phoneCodes' => PhoneCode::options(),
      'states' => State::all(),
      'municipalities' => Municipality::all(),
    ]);
  }

  public function register(RegisterUserRequest $request): RedirectResponse
  {
    $identification_card = IdentificationCard::create(
      $request->safe()->only(['type', 'identification_number']),
    );

    $phone = Phone::create(
      $request->safe()->only(['code_phone', 'phone_number']),
    );

    $address = Address::create(
      $request->safe()->only(['address', 'state_id', 'municipality_id']),
    );

    $user = User::create(
      $request->safe()
        ->merge(['password' => bcrypt($request->password), 'identification_card_id' => $identification_card->id, 'phone_id' => $phone->id, 'address_id' => $address->id])
        ->only(['name', 'email', 'username', 'password', 'birth', 'identification_card_id', 'phone_id', 'address_id']),
    )->assignRole(Role::CUSTOMER);

    Geolocation::create([
      'user_id' => $user->id,
    ]);

    event(new Registered($user));

    Auth::login($user);

    return to_route('verification.notice')
      ->with('status', 'Usuario creado exitosamente!');
  }
}
