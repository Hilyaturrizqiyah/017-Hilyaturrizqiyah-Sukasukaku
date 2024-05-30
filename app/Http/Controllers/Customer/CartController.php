<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log; // Tambahkan ini untuk menggunakan fasilitas logging

class CartController extends Controller
{
    public function index(Request $request)
    {
        // Get cart items from session
        $cart = $request->session()->get('cart', []);
        
        // If cart is not empty, fetch product data based on product IDs
        $cartItems = [];
        $totalPrice = 0;

        foreach ($cart as $productId => $item) {
            $product = Product::findOrFail($productId);

            $cartItems[] = [
                'id' => $productId,
                'name' => $product->name,
                'serve_price' => $product->serve_price,
                'quantity' => $item['quantity'],
                'image' => $product->image,
                // Add more product data if needed
            ];

            // Calculate total price
            $totalPrice += $product->serve_price * $item['quantity'];
        }

        return view('customer.cart', compact('cartItems', 'totalPrice'));
    }

    public function addToCart(Request $request, $productId)
    {
        // Logic to add product to cart
        $product = Product::findOrFail($productId);

        // Get cart from session or create an empty array
        $cart = $request->session()->get('cart', []);

        // Check if product is already in cart
        if (isset($cart[$productId])) {
            // Increment quantity if product is already in cart
            $cart[$productId]['quantity']++;
        } else {
            // Add new product to cart
            $cart[$productId] = [
                'name' => $product->name,
                'serve_price' => $product->serve_price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }

        $request->session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    public function removeFromCart(Request $request, $productId)
    {
        // Logic to remove product from cart
        $cart = $request->session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            $request->session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully');
        }

        return redirect()->route('cart.index')->with('error', 'Product not found in cart');
    }
}
