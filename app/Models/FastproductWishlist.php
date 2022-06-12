<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class FastproductWishlist extends Model
{
    protected $table = 'fastproduct_wishlist';
    protected $fillable = ['user_id', 'fastproduct_id', 'price'];
}
