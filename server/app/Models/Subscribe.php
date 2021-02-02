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

    public function owner() {
        return $this->belongsTo(Owner::class,'owner_id');
    }

    public function estate() {
        return $this->belongsTo(Estate::class,'estate_id');
    }

    public function income() {
        return $this->hasOne(Income::class,'subscribe_id');
    }

    public function getStatus() {
        if($this->status == 1) {
            return "WAITING";
        }
        elseif($this->status == 2) {
            return "IN PROCESSING";
        }
        elseif ($this->status == 3) {
            return "DONE";
        }
        else return "SUCCESS";
    }

    public function getBadge() {
        if($this->status == 1) {
            return "badge-danger";
        }
        elseif($this->status == 2) {
            return "badge-info";
        }
        elseif ($this->status == 3) {
            return "badge-warning";
        }
        else return "badge-success";
    }
}
