<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'phone',
        'oauth_id',
        'oauth_type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function details()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function interests()
    {
        return $this->belongsToMany(Category::class, 'user_interests');
    }

    public function interestIds()
    {
        return $this->interests()->pluck('categories.id');
    }

    /* Get User's image */
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    /* Get User's posts */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function postsCounted(){
        return $this->posts()->count();
    }

     public function communities()
    {
        return $this->belongsToMany(Community::class, 'community_user');
    }

    public function real_estate_posts(){
        return $this->hasMany(RealEstatePost::class);
    }

    public function favorite_real_estate_posts()
    {
        return $this->belongsToMany(RealEstatePost::class, 'real_estate_saves', 'user_id', 'real_estate_post_id');
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
