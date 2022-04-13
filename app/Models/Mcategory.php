<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Mcategory extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'mcategories';

    protected $fillable = ['photo_name'];
    public $translatedAttributes = ['category_name', 'description'];

    /**
     * The fastProduct that belong to the maincategory.
     */
    public function fastproducts()
    {
        return $this->belongsToMany(Fastproduct::class);
    }

    /**
     * The Product that belong to the maincategory.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
