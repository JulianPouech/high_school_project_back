<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $visible = [
        'name',
        'price',
        'description'
    ];

    protected $fillable = [
        'name',
        'price',
        'description'
    ];

}
