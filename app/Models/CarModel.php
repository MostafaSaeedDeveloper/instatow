<?php

namespace App\Models;

use App\Models\CarMake;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = ['model', 'car_make_id'];

    public function make()
    {
        return $this->belongsTo(CarMake::class);
    }
}
