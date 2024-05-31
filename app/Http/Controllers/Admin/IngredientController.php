<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::paginate(10);
        return view('admin.data-ingredient', compact('ingredients'));
    }

    public function create()
    {
        return view('admin.data-ingredient');
    }

    public function show(Ingredient $ingredient)
    {
        return response()->json($ingredient);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ingredient_name' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ingredient = new Ingredient();
        $ingredient->ingredient_name = $request->input('ingredient_name');
        $ingredient->unit = $request->input('unit');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ingredients', 'public');
            $ingredient->image = $imagePath;
        }

        $ingredient->save();

        return redirect()->route('ingredients.index')->with('success', 'Ingredient added successfully.');
    }

    public function edit(Ingredient $ingredient)
    {
        return view('admin.data-ingredients', compact('ingredient'));
    }

    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'ingredient_name' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ingredient->ingredient_name = $request->input('ingredient_name');
        $ingredient->unit = $request->input('unit');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ingredients');
            $ingredient->image = $imagePath;
        }

        $ingredient->save();

        return redirect()->route('ingredients.index')->with('success', 'Ingredient updated successfully.');
    }

    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('ingredients.index')->with('success', 'Ingredient deleted successfully.');
    }
}
