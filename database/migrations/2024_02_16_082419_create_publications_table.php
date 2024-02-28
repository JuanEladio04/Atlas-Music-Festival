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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('content');
            $table->text('image_path')->nullable();
            $table->unsignedBigInteger('uid'); 
            $table->foreign('uid')->references('id')->on('users');
            $table->timestamps();
        });

        // Agregar restricción para permitir solo usuarios del tipo 'singer' para crear publicaciones
        Schema::table('publications', function (Blueprint $table) {
            $table->foreign('uid')
                  ->references('id')
                  ->on('users')
                  ->where('type', 'singer'); // Restringir el tipo de usuario
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->dropForeign(['uid']);
        });

        Schema::dropIfExists('publications');
    }
};
