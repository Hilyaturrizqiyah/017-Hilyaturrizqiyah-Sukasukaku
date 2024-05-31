<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductIngredient;
use Illuminate\Http\Request;

class ProductIngredientController extends Controller
{
    public function index()
    {
        $productIngredients = ProductIngredient::paginate(10);
        return view('admin.product-ingredient', compact('productIngredients'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'ingredient_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        ProductIngredient::create($request->all());

        return redirect()->route('product-ingredients.index')->with('success', 'Product Ingredient created successfully.');
    }



    public function show(ProductIngredient $productIngredient)
    {
        return response()->json($productIngredient);
    }


    public function edit(ProductIngredient $productIngredient)
    {
        return view('admin.product-ingredient', compact('productIngredient'));
    }

    public function update(Request $request, ProductIngredient $productIngredient)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'ingredient_id' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $productIngredient->update($request->all());

        return redirect()->back()->with('success', 'Product Ingredient updated successfully.');
    }

    public function destroy(ProductIngredient $productIngredient)
    {
        $productIngredient->delete();

        return redirect()->route('product-ingredients.index')->with('success', 'Product Ingredient deleted successfully.');
    }
}
