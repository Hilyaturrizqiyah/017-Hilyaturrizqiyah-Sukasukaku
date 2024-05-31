<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $totalCustomers = User::where('role', 'customer')->count();
        $totalProducts = Product::count();
        $totalTransactions = Transaction::count();
        
        return view('admin.dashboard', compact('user', 'totalCustomers', 'totalProducts', 'totalTransactions'));
    }
}
