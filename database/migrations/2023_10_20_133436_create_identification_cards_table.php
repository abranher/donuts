<?php

use App\Enums\TypeIdentificationCard;
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
    Schema::create('identification_cards', function (Blueprint $table) {
      $table->id();
      $table->enum('type', TypeIdentificationCard::options());
      $table->string('identification_number', 10);
      $table->unique(['type', 'identification_number']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('identification_cards');
  }
};
