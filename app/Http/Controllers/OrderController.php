<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Show Orders in Admin Panel
    public function index()
    {
        // Get all orders, including user and product info (optional)
        $orders = Order::with(['user', 'product'])->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function processOrder(Request $request)
    {
        // Assuming the product is stored in the session
        $product = $request->session()->get('cart');

        if (!$product) {
            return redirect()->route('home')->with('error', 'No product found in cart.');
        }

        // Create the order with user, product, and total price
        $order = Order::create([
            'user_id' => Auth::id(), // Use the authenticated user
            'product_id' => $product->id, // Link to the ordered product
            'total_price' => $product->price, // The price of the product
        ]);

        // Clear the session data after the order is placed
        $request->session()->forget('cart');

        // Redirect the user to a confirmation page or home
        return redirect()->route('order.success', ['order' => $order]);
    }

    public function orderSuccess(Order $order)
    {
        return view('order-success', compact('order'));
    }
}
