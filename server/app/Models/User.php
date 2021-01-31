<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    public function role() {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function cities() {
        return $this->hasMany(City::class,'user_id');
    }
}
