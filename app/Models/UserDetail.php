<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'occupation_id', 'country_id', 'state', 'city','longitude', 'latitude', 'bio'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function occupation(){
        return $this->belongsTo(Occupation::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
