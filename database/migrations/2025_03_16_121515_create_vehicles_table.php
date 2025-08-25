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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('make');
            $table->string('model');
            $table->string('type');
            $table->string('color')->nullable();
            $table->string('plate')->nullable();
            $table->string('state')->nullable();
            $table->string('vin')->nullable();
            $table->string('lot')->nullable();
            $table->string('gate_pass_pin')->nullable();
            $table->integer('tariff')->nullable();
            $table->morphs('vehicle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
