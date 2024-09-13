<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'parent_id', 'icon', 'slug', 'status'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_interests');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }


    public function sub_categories() {
        return $this->hasMany(Category::class, 'parent_id');
    }

}
