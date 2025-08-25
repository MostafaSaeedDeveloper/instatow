<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'customer_id',
        // Pickup Contact and Location
        'from_working_hours_days',
        'from_working_hours_time',
        'from_forklift',
        'from_contact_name',
        'from_contact_phone',
        'from_contact_phone1',
        'from_contact_buyer_number',
        'from_contact_company',
        'from_address',
        'from_address2',
        'from_city',
        'from_state',
        'from_zip',
        'from_country',
        // Delivery Contact and Location
        'to_working_hours_days',
        'to_working_hours_time',
        'to_forklift',
        'to_contact_name',
        'to_contact_phone',
        'to_contact_phone1',
        'to_contact_buyer_number',
        'to_contact_company',
        'to_address',
        'to_address2',
        'to_city',
        'to_state',
        'to_zip',
        'to_country',
        // Shipping Information
        'picked_up',
        'pickup_date',
        'load_date_type',
        'load_date',
        'delivery_date_type',
        'delivery_date',
        'run',
        'ship_via',
        'stuff_type',
        'stuff_calc',
        'stuff_description',
        'notes_from_customer',
        'notes_to_customer',
        'notes_for_carrier',
        // Payment
        'tariff',
        'deposit',
        'carrier_pay',
        'paid_by',
        'payment_method',
        'time_paid',
        'status',
        'agent_id'
    ];


    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function vehicles()
{
    return $this->morphMany(Vehicle::class, 'vehicle');
}

}
