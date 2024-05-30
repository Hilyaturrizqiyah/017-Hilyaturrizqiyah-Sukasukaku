<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductShowController extends Controller
{
    public function show($id)
    {
        $product = Product::with('ingredients')->findOrFail($id);
        return view('customer.product-detail', compact('product'));
    }
    
}
