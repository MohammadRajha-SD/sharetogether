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

    // Optionally, define the default value for visibility
    protected $attributes = [
        'visibility' => 1, // Public by default
    ];
}
