<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image1',
        'image2'
    ];

    function getNameImage1(){
        return '/storage/images/' .ltrim($this->image1, '/public/images/');
    }
    function getNameImage2(){
        return '/storage/images/' .ltrim($this->image2, '/public/images/');
    }
}
