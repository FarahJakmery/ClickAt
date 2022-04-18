<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['feature1', 'text1', 'feature2', 'text2', 'feature3', 'text3'];
}
