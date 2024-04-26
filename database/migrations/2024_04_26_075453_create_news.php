<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('news', function (Blueprint $table) {
      $table->id();
      $table->string('publishedAt');
      $table->string('title');
      $table->string('author');
      $table->string('urlImage');
      $table->text('description');
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('news');
  }
};
