<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

   protected $guarded = [];
    public function productOffered()
    {
        return $this->belongsTo(Product::class, 'product_id_offered');
    }

    // The product that was requested in the exchange
    public function productRequested()
    {
        return $this->belongsTo(Product::class, 'product_id_requested');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
