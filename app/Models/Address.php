<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = ['address1', 'city1', 'state1', 'country1', 'zip1', 'address2', 'city2', 'state2', 'country2', 'zip2', 'user_id'];
}
