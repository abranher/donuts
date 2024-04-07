<?php

use App\Enums\PhoneCode;
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
    Schema::create('phones', function (Blueprint $table) {
      $table->id();
      $table->enum('code_phone', PhoneCode::options());
      $table->string('phone_number', 7);
      $table->unique(['code_phone', 'phone_number']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('phones');
  }
};
