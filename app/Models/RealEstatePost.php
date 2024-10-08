<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstatePost extends Model
{
    use HasFactory;

    protected $guarded = [];

    // image posts
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // POST SAVES
    public function saves()
    {
        return $this->hasMany(RealEstateSave::class);
    }

    public function isSavedByUser($userId)
    {
        return $this->saves()->where('user_id', $userId)->exists();
    }


    public function state_name(){
        return $this->belongsTo(State::class, 'state');
    }

    public function city_name(){
        return $this->belongsTo(City::class, 'city');
    }
}
