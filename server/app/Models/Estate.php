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
    public function subscribes() {
        return $this->hasMany(Subscribe::class,'estate_id');
    }

    public function getStatus() {
        if($this->status == 1) {
            return "WAITING";
        }
        elseif($this->status == 2) {
            return "APPROVE";
        }
        elseif ($this->status == 3) {
            return "CANCEL";
        }
        else return "DONE";
    }

    public function getBadge() {
        if($this->status == 1) {
            return "badge-warning";
        }
        elseif($this->status == 2) {
            return "badge-info";
        }
        elseif ($this->status == 3) {
            return "badge-danger";
        }
        else return "badge-success";
    }
}
