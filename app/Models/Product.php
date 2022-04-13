<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'products';

    protected $fillable = ['photo_name', 'url'];
    public $translatedAttributes = ['product_name'];

    /**
     * The maincategories that belong to the product.
     */
    public function maincategories()
    {
        return $this->belongsToMany(Mcategory::class);
    }
}
