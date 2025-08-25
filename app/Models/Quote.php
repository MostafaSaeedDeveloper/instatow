<?php

namespace App\Models;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial',
        'year',
        'make',
        'model',
        'type',
        'from_city',
        'from_state',
        'from_zip',
        'from_country',
        'to_city',
        'to_state',
        'to_zip',
        'to_country',
        'picked_up',
        'notes',
        'run',
        'ship_via',
        'specific_date',
        'customer_id',
        'tariff',
        'agent_id'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function vehicles()
{
    return $this->morphMany(Vehicle::class, 'vehicle');
}

    public function agent() {
        return $this->belongsTo(User::class, 'agent_id');
    }

}
