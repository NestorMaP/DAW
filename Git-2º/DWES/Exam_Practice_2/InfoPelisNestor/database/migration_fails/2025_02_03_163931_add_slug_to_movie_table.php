<?php
// Práctica 7 (No utilizada porque se ha añadido la columna en phpMyAdmin)
/*
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *//*
    public function up(): void
    {
        Schema::table('movie', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *//*
    public function down(): void
    {
        Schema::table('movie', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
*/
