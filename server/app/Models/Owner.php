<?php

namespace App\Models;

use Illuminate\Foundation\Auth\Owner as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Owner extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;
    public function estates() {
        return $this->hasMany(Estate::class,'owner_id');
    }

    public function subscribes() {
        return $this->hasMany(Subscribe::class,'owner_id');
    }
    function getNameImage(){
        return '/storage/images/' .ltrim($this->image, '/public/images/');
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $fillable  = [
        'name',
        'email',
        'address',
        'password',
        'phone'
    ];
}
