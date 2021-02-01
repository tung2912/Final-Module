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

    public function checkRole() {
        return $this->role->id == \App\Models\RoleConstants::ROLE_ADMIN ? "badge-success" : "badge-info";
    }

    function getNameImage(){
        return '/storage/images/' .ltrim($this->image, '/public/images/');
    }
}
