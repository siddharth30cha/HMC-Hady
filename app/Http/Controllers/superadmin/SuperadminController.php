<?php

namespace App\Http\Controllers\superadmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\User;
use App\Models\Expense;
use App\Models\Product;
use Auth;
use Session;
use DB; 
use Mail; 
use Str;

class SuperadminController extends Controller{
    public function dashboard(Request $request){
        $usercount = User::count();
        $supplier = Supplier::count();
        $category = Category::count();
        $expense = Expense::count();
        $product = Product::count();
        return view('superadmin.dashboard', compact('usercount', 'supplier', 'category', 'expense', 'product'));
    }

    public function profile(Request $request){
        $user = Auth::user();
        return view('superadmin.profile', compact('user'));
    }
}
