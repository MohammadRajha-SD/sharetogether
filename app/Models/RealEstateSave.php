<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstateSave extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function real_estate_post()
    {
        return $this->belongsTo(RealEstatePost::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
