<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstatePost extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

}
