<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name', 80); 
      $table->string('email')->unique();
      $table->string('username', 20)->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->date('birth');
      $table->foreignId('identification_card_id')
        ->constrained();
      $table->foreignId('phone_id')
        ->constrained();
      $table->foreignId('address_id')
        ->constrained();
      $table->string('secret_token')->nullable();
      $table->string('last_conection')->nullable();
      $table->string('image_profile', 100)->default('20240118xgWsT1W1FHcPP5k7gWhT3rm7Qr8fyHdHpURJ5sg5oTpoy.jpg');
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
