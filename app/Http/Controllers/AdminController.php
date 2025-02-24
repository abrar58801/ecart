<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'orders' => Order::count(),
            'products' => Product::count(),
            'categories' => ProductCategory::count(),
        ]);
    }
}
