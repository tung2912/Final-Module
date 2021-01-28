<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;

    protected $fillable = [
      'client_id',
      'city_id',
      'address',
      'price',
      'floor_space',
      'bedroom_nums',
      'bathroom_nums',
      'garage_nums',
      'description',
      'status'
    ];

    public function city() {
        return $this->belongsTo(City::class,'city_id');
    }

    public function images() {
        return $this->hasMany(Image::class,'estate_id');
    }

    public function client() {
        return $this->belongsTo(Client::class,'client_id');
    }
}
