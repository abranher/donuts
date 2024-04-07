<?php

namespace Database\Seeders;

use App\Enums\PhoneCode;
use App\Enums\Role;
use App\Enums\TypeIdentificationCard;
use App\Models\Address;
use App\Models\Geolocation;
use App\Models\IdentificationCard;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $IdentificationCard = IdentificationCard::create([
      'type' => TypeIdentificationCard::VENEZOLANO,
      'identification_number' => '31081318',
    ]);

    $Phone = Phone::create([
      'code_phone' => PhoneCode::VE_0412,
      'phone_number' => '8974648',
    ]);

    $Address = Address::create([
      'address' => 'santa cruz calle 24 casa 20s',
      'state_id' => 4,
      'municipality_id' => 40,
    ]);

    $User = User::create([
      "name" => "Abraham Hernández",
      "email" => "abran@gmail.com",
      "username" => "abranher",
      "password" => bcrypt("Abran123."),
      'birth' => '2003-09-28',
      'identification_card_id' => $IdentificationCard->id,
      'phone_id' => $Phone->id,
      'address_id' => $Address->id,
    ])->assignRole(Role::ADMIN);

    Geolocation::create([
      'user_id' => $User->id,
    ]);
  }
}
