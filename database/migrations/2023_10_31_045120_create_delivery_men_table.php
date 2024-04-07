<?php

use App\Enums\VehicleType;
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
    Schema::create('delivery_men', function (Blueprint $table) {
      $table->id();
      $table->enum('vehicle_type', VehicleType::options());
      $table->string('plate', 7);
      $table->foreignId('user_id')
        ->constrained();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('delivery_men');
  }
};
