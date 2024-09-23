<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function exchanges()
    {
        return $this->hasMany(Exchange::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offeredExchanges()
    {
        return $this->hasMany(Exchange::class, 'product_id_offered');
    }

    public function requestedExchanges()
    {
        return $this->hasMany(Exchange::class, 'product_id_requested');
    }
}
