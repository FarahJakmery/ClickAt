<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;

class Fastproduct extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'fastproducts';

    protected $fillable = ['product_number', 'photo_name', 'min_price', 'max_price', 'counter', 'minutes', 'decreasing_value', 'product_date', 'expiry_date'];
    public $translatedAttributes = ['name'];

    /**
     * The main_categories that belong to the fastProduct.
     */
    public function mcategories()
    {
        return $this->belongsToMany(Mcategory::class);
    }

    /**
     * Get the orderItem associated with the fastProduct.
     */
    public function orderItem()
    {
        return $this->hasOne(OrderItem::class);
    }
}
