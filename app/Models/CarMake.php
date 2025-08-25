<?php

namespace App\Models;

use App\Models\CarYear;
use App\Models\CarModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarMake extends Model
{
    use HasFactory;


    protected $fillable = ['make', 'make_id', 'car_year_id'];


    public function models()
    {
        return $this->hasMany(CarModel::class);
    }

    public function year()
    {
        return $this->belongsTo(CarYear::class);
    }
}
