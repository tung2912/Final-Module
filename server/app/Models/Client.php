<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'password',
        'isRegistered'
    ];


    public function subscribes () {
        return $this->hasOne(Subscribe::class,'client_id');
    }
}
