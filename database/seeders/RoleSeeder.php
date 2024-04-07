<?php

namespace Database\Seeders;

use App\Enums\Role as EnumRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Role::create(['name' => EnumRole::ADMIN]);
    Role::create(['name' => EnumRole::CUSTOMER]);
    Role::create(['name' => EnumRole::DELIVERY_MAN]);
  }
}
