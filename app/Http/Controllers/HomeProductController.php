<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(8);

        return view('welcome', compact('products'));
    }


    // Direct Buy Now
    public function buyNow(Request $request)
    {
        // Validate that the product exists
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        // Find the product and store it in the session (direct purchase)
        $product = Product::findOrFail($request->product_id);

        // Store the product in session
        session(['cart' => $product]);

        // Redirect to checkout page
        return redirect()->route('checkout');
    }

    // Checkout Page
    public function checkout()
    {
        // Retrieve the product from the session
        $cart = session('cart');

        // If the session cart is empty, redirect to the products page
        if (!$cart) {
            return redirect()->route('home')->with('error', 'No product in cart.');
        }

        // In a real-world scenario, this is where you'd process payments and finalize the order.
        return view('checkout', compact('cart'));
    }

    // Process order (simplified version)
    public function processOrder()
    {
        // For now, just clear the session and redirect back to the home page
        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}
