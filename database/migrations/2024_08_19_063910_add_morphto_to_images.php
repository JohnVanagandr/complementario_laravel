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
    Schema::table('images', function (Blueprint $table) {
      // // Eliminamos la relación  a post
      // $table->dropForeign('images_post_id_foreign');
      // $table->dropColumn('post_id');
      // Creamos las columnas para las nuevas ralaciones polimorficas
      $table->unsignedBigInteger('imageable_id');
      $table->string('imageable_type');
      $table->string('disk');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('images', function (Blueprint $table) {
      $table->dropColumn('imageable_id');
      $table->dropColumn('imageable_type');
      $table->dropColumn('disk');
    });
  }
};
