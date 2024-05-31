<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
    use HasFactory;

    protected $table = 'product_ingredient';

    protected $fillable = [
        'product_id',
        'ingredient_id',
        'quantity',
    ];

    // Relasi dengan model Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relasi dengan model Ingredient
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
