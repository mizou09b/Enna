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
        Schema::create('enna_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('Aerodromes_Internationaux')->nullable();
            $table->string('Aerodromes_Nationaux')->nullable();
            $table->string('Movements_Aerodromes')->nullable();
            $table->string('Survols')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enna_numbers');
    }
};
