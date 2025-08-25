<?php

namespace App\Models;

use App\Models\Lead;
use App\Models\Quote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'username',
        'email',
        'phone',
        'phone2',
        'cellphone',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip',
        'country',
        'fax',
        'password',
    ];

    public function leads() {
        return $this->hasMany(Lead::class);
    }
    public function quotes() {
        return $this->hasMany(Quote::class);
    }
}
