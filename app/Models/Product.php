<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'serve_price', 
        'image',
        'qty_product',
        'instruction',
        'description',
    ];


    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'product_ingredient')->withPivot('quantity');
    }
}
