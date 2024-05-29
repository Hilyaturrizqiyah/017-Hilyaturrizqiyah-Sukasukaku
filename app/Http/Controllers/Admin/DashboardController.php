<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $totalCustomers = User::where('role', 'user')->count();
        
        return view('admin.dashboard', compact('user', 'totalCustomers'));
    }
}
