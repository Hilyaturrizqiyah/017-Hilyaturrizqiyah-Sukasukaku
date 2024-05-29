<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'ingredient_name',
        'ingredient_price',
        'unit',
        'image',
        'ingredient_photo',
    ];
}
