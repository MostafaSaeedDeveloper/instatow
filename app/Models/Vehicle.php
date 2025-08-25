<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class Vehicle extends Model
{
    use HasFactory;


    protected $fillable = [
        'year',
        'make',
        'model',
        'type',
        'color',
        'plate',
        'state',
        'vin',
        'lot',
        'gate_pass_pin',
        'tariff',
        'vehicle_id', // Polymorphic ID
        'vehicle_type' // Polymorphic Type
    ];

    public function vehicle(): MorphTo
    {
        return $this->morphTo();
    }

}
