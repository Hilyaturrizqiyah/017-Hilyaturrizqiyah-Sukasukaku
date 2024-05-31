<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['details.product', 'user'])->paginate(10);
        return view('admin.transaction', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:users,id',
            'total_price' => 'required|numeric',
            'status' => 'required|string|max:10',
            'details' => 'required|array',
            'details.*.product_id' => 'required|exists:products,id',
            'details.*.product_price' => 'required|numeric',
            'details.*.qty' => 'required|integer',
        ]);

        $transaction = Transaction::create($request->only('customer_id', 'total_price', 'status'));
        foreach ($request->details as $detail) {
            $transaction->transactionDetails()->create($detail);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction)
    {
        $transaction->load('transactionDetails.product');
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        $transaction->load('details.product');
        $products = Product::all();
        return view('admin.transaction', compact('transaction', 'transactions', 'products'));

    }

    public function update(Request $request, Transaction $transaction)
    {
        // Validasi data yang diterima
        $request->validate([
            'status' => 'required|string',
        ]);

        // Perbarui status transaksi
        $transaction->status = $request->input('status');
        $transaction->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Transaction updated successfully');
    }


    public function destroy(Transaction $transaction)
    {
        $transaction->transactionDetails()->delete();
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
