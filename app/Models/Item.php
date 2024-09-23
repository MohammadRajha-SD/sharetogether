<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function exchangesAsUserOne()
    {
        return $this->hasMany(Exchange::class, 'item_one_id');
    }

    public function exchangesAsUserTwo()
    {
        return $this->hasMany(Exchange::class, 'item_two_id');
    }
}
