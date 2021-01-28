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

    public function estates() {
        return $this->hasMany(Estate::class,'client_id');
    }

    public function subscribes () {
        return $this->hasMany(Subscribe::class,'client-id');
    }
}
