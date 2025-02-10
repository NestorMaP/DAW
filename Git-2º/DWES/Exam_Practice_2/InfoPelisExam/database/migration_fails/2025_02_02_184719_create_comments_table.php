<?php
// Práctica 4

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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // Aquí me da un error por incompatibilidad de datos entre mysql y las migraciones por ser int y bigint respectivamente.
            // De todas formas crea la tabla

            $table->integer('movie_id');
            $table->foreign('movie_id')->references('id')->on('movie')->onDelete('cascade');
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('post');
            $table->integer('rating');
            $table->boolean('visibility');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
