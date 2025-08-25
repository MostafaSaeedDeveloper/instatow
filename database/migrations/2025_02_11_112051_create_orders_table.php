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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial');
            //Customer Information
            $table->foreignId('customer_id')->constrained();
            //Pickup Contact and Location
            $table->string('from_working_hours_days')->nullable();
            $table->string('from_working_hours_time')->nullable();
            $table->enum('from_forklift', ['Provided', 'Not Provided'])->nullable();
            $table->string('from_contact_name')->nullable();
            $table->string('from_contact_phone')->nullable();
            $table->string('from_contact_phone1')->nullable();
            $table->string('from_contact_buyer_number')->nullable();
            $table->string('from_contact_company')->nullable();
            $table->string('from_address')->nullable();
            $table->string('from_address2')->nullable();
            $table->string('from_city');
            $table->string('from_state');
            $table->string('from_zip');
            $table->string('from_country');
            //Delivery Contact and Location
            $table->string('to_working_hours_days')->nullable();
            $table->string('to_working_hours_time')->nullable();
            $table->enum('to_forklift', ['Provided', 'Not Provided'])->nullable();
            $table->string('to_contact_name')->nullable();
            $table->string('to_contact_phone')->nullable();
            $table->string('to_contact_phone1')->nullable();
            $table->string('to_contact_buyer_number')->nullable();
            $table->string('to_contact_company')->nullable();
            $table->string('to_address')->nullable();
            $table->string('to_address2')->nullable();
            $table->string('to_city');
            $table->string('to_state');
            $table->string('to_zip');
            $table->string('to_country');
            //Shipping Information
            $table->string('picked_up')->default('Flexible');
            $table->date('pickup_date')->nullable();
            $table->enum('load_date_type', ['Estimated', 'Exactly', 'No Earlier Than', 'No Later Than'])->default('Estimated');
            $table->date('load_date')->nullable();
            $table->enum('delivery_date_type', ['Estimated', 'Exactly', 'No Earlier Than', 'No Later Than'])->default('Estimated');
            $table->date('delivery_date')->nullable();
            $table->boolean('run')->default(1);
            $table->enum('ship_via', ['open', 'enclosed', 'driveaway'])->default('open');
            $table->enum('stuff_type', ['Need confirmation', 'Yes', 'No'])->nullable();
            $table->enum('stuff_calc', ['Around', 'Not more'])->nullable();
            $table->string('stuff_description')->nullable();
            $table->longText('notes_from_customer')->nullable();
            $table->longText('notes_to_customer')->nullable();
            $table->longText('notes_for_carrier')->nullable();
            //Payment
            $table->integer('tariff');
            $table->integer('deposit')->nullable();
            $table->integer('carrier_pay')->nullable();
            $table->enum('paid_by', ['cash_to_carrier', 'pre_payment', 'balance_to_carrier'])->nullable();
            $table->string('payment_method')->nullable();
            $table->enum('time_paid', ['On Pickup', 'On Delivery'])->default('On Delivery')->nullable();
            $table->string('status');
            $table->foreignId('agent_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
