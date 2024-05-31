<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // Get cart items from session
        $cart = $request->session()->get('cart', []);
        
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
            ];

            $totalPrice += $product->serve_price * $item['quantity'];
        }

        return view('customer.checkout', compact('cartItems', 'totalPrice'));
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        // Get cart items from session
        $cart = $request->session()->get('cart', []);
        $totalPrice = 0;
        $user = Auth::user();
        $user->address = $request->address;

        foreach ($cart as $productId => $item) {
            $product = Product::findOrFail($productId);
            $totalPrice += $product->serve_price * $item['quantity'];
        }

        // Create transaction
        $transaction = Transaction::create([
            'customer_id' => Auth::id(),
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        // Create transaction details
        foreach ($cart as $productId => $item) {
            $product = Product::findOrFail($productId);

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'product_price' => $product->serve_price,
                'qty' => $item['quantity'],
            ]);
        }

        // Clear the cart
        $request->session()->forget('cart');

        return redirect()->route('checkout.index')->with('success', 'Order placed successfully');
    }
}
