<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McategoryTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['category_name', 'description'];
}
