<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Feature extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $table = 'features';

    protected $fillable = [];
    public $translatedAttributes = ['feature1', 'text1', 'feature2', 'text2', 'feature3', 'text3'];
}
