<?php

namespace App\Models;

use App\Models\CarMake;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarYear extends Model
{
    use HasFactory;

    protected $fillable = ['year'];


    public function makes()
    {
        return $this->hasMany(CarMake::class);
    }
}
