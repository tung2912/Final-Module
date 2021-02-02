<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public function estates() {
        return $this->hasMany(Estate::class,'owner_id');
    }

    public function subscribes() {
        return $this->hasMany(Subscribe::class,'owner_id');
    }
}
