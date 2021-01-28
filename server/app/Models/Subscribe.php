<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;

    protected $fillable = [
      'client_id',
      'estate_id',
      'user_id',
      'status'
    ];

    public function client() {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function estate() {
        return $this->belongsTo(Estate::class,'estate_id');
    }

    public function income() {
        return $this->hasOne(Income::class,'subscribe_id');
    }
}
