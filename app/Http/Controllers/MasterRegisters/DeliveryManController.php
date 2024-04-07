<?php

namespace App\Http\Controllers\MasterRegisters;

use App\Enums\Role;
use App\Enums\PhoneCode;
use App\Enums\TypeIdentificationCard;
use App\Enums\VehicleType;
use App\Http\Controllers\Controller;
use App\Http\Requests\MasterRegisters\StoreDeliveryManRequest;
use App\Http\Requests\MasterRegisters\UpdateDeliveryManRequest;
use App\Models\Address;
use App\Models\DeliveryMan;
use App\Models\Geolocation;
use App\Models\IdentificationCard;
use App\Models\Municipality;
use App\Models\Phone;
use App\Models\State;
use App\Models\User;
use Illuminate\View\View;

class DeliveryManController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('admin.delivery-men.index', [
      'deliveryMen' => DeliveryMan::with('user')->get()->each(function ($item) {
        $item->user->phone;
        $item->user->identificationCard;
      }),
    ]);
  }

  public function getData(): array
  {
    return [
      'vehicle_type' => VehicleType::options(),
      'typeIdentificationCard' => TypeIdentificationCard::options(),
      'phoneCodes' => PhoneCode::options(),
      'states' => State::all(),
      'municipalities' => Municipality::all(),
    ];
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('admin.delivery-men.create', $this->getData());
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreDeliveryManRequest $request)
  {
    $identification_card = IdentificationCard::create(
      $request->safe()->only(['type', 'identification_number'])
    );

    $phone = Phone::create(
      $request->safe()->only(['code_phone', 'phone_number'])
    );

    $address = Address::create(
      $request->safe()->only(['address', 'state_id', 'municipality_id'])
    );

    $user = User::create(
      $request->safe()
        ->merge(['password' => bcrypt($request->password), 'identification_card_id' => $identification_card->id, 'phone_id' => $phone->id, 'address_id' => $address->id])
        ->only(['name', 'email', 'username', 'password', 'birth', 'identification_card_id', 'phone_id', 'address_id'])
    )->assignRole(Role::DELIVERY_MAN);

    Geolocation::create([
      'user_id' => $user->id,
    ]);

    DeliveryMan::create(
      $request->safe()->merge(['user_id' => $user->id])->only(['vehicle_type', 'plate', 'user_id'])
    );

    return to_route('delivery-men.index')->with('status', 'Repartidor creado exitosamente!');
  }

  /**
   * Display the specified resource.
   */
  public function show(DeliveryMan $delivery_man)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(DeliveryMan $delivery_man)
  {
    $delivery_man->user;
    $delivery_man->user->phone;
    $delivery_man->user->identificationCard;
    $delivery_man->user->address;
    $delivery_man->user->address->state;
    $delivery_man->user->address->municipality;
    $data = $this->getData();
    $data['delivery_man'] = $delivery_man;

    return view('admin.delivery-men.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateDeliveryManRequest $request, DeliveryMan $delivery_man)
  {
    $delivery_man->user->identificationCard->update(
      $request->safe()->only(['type', 'identification_number'])
    );

    $delivery_man->user->phone->update(
      $request->safe()->only(['code_phone', 'phone_number'])
    );

    $delivery_man->user->address->update(
      $request->safe()->only(['address', 'state_id', 'municipality_id'])
    );

    $delivery_man->user->update(
      $request->safe()->only(['name', 'email', 'username', 'birth'])
    );

    $delivery_man->update(
      $request->safe()->only(['vehicle_type', 'plate'])
    );

    return to_route('delivery-men.index')->with('status', 'Repartidor actualizado exitosamente!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(DeliveryMan $delivery_man)
  {
    $delivery_man->delete();

    $user = User::find($delivery_man->user_id);
    $user->delete();

    return to_route('delivery-men.index')->with('status', 'Repartidor eliminado exitosamente!');
  }
}
