<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
      'subscribe_id',
      'amount',
      'e-commission',
      'company-income',
      'client-income',
    ];

    public function subscribe() {
        return $this->belongsTo(Subscribe::class,'subscribe_id');
    }
}
