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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial');
            $table->string('from_city');
            $table->string('from_state');
            $table->string('from_zip');
            $table->string('from_country');
            $table->string('to_city');
            $table->string('to_state');
            $table->string('to_zip');
            $table->string('to_country');
            $table->string('picked_up')->default('Flexible');
            $table->longText('notes')->nullable();
            $table->boolean('run')->default(1);
            $table->enum('ship_via', ['open', 'enclosed', 'driveaway'])->default('open');
            $table->date('specific_date')->nullable();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('agent_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
