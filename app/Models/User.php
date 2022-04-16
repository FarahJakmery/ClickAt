<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_number'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    // ================================ Fast Product WishList ================================

    public function fastProductWishlist()
    {
        return $this->belongsToMany(Fastproduct::class, 'fastproduct_wishlist')->withTimestamps();
    }

    public function fastProductWishlistHas($FastProductId)
    {
        return self::fastProductWishlist()->where('fastproduct_id', $FastProductId)->exists();
    }

    // ================================ Product WishList ================================

    /**
     * Get the wishlist of the user.
     */
    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'product_wishlist')->withTimestamps();
    }

    public function wishlistHas($productId)
    {
        return self::wishlist()->where('product_id', $productId)->exists();
    }

    // ================================ Code WishList ================================

    public function CodeWishlist()
    {
        return $this->belongsToMany(Codeproduct::class, 'code_wishlist')->withTimestamps();
    }

    public function codeWishlistHas($CodeProductId)
    {
        return self::CodeWishlist()->where('fastproduct_id', $CodeProductId)->exists();
    }
}
