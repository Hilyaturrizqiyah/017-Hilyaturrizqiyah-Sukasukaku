<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaction;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        $customerId = Auth::id();

        // Ambil data transaksi berdasarkan ID customer
        $orders = Transaction::where('customer_id', $customerId)->with('details.product')->get();

        return view('customer.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Transaction::with(['details.product.ingredients' => function ($query) {
            $query->withPivot('quantity');
        }])->findOrFail($id);

        if ($order->customer_id !== Auth::id()) {
            return redirect()->route('orders.index')->with('error', 'You are not authorized to view this order.');
        }

        return view('customer.order-detail', compact('order'));
    }

}
