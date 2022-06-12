<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class FastproductMcategory extends Model
{

    protected $table = 'fastproduct_mcategory';

    protected $fillable = ['fastproduct_id', 'mcategory_id', 'id'];
}
