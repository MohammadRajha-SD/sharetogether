<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters){
        // $query->when($filters['search'] ?? false, function($query, $search) {
        //     $query->where(fn($query) => 
        //             $query
        //                 ->where('title', 'like', '%' . $search . '%')
        //                 ->orWhere('body', 'like', '%' . $search . '%')
        //             );
        // });

        $query->when($filters['category'] ?? false, function($query, $category) {
            $query->whereHas('category', fn($query) => $query->where('categories.slug', $category));
        });

        $query->when($filters['user'] ?? false, function($query, $author) {
            $query->whereHas('user', fn($query) => 
                $query->where('user', $author));
        });
     }



    
    // IMAGES MODEL
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
    
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // USER
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // POST LIKES MODEL
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedByUser($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }

    // POST SAVES MODEL
    public function saves()
    {
        return $this->hasMany(PostSave::class);
    }

    public function isSavedByUser($userId)
    {
        return $this->saves()->where('user_id', $userId)->exists();
    }
}
