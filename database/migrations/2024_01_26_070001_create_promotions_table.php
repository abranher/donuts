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
    Schema::create('promotions', function (Blueprint $table) {
      $table->id();
      $table->string('title', 60);
      $table->unsignedDecimal('discount');
      $table->dateTime('start_date');
      $table->dateTime('end_date');
      $table->string('description', 200);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('promotions');
  }
};
