<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory; // Import the ProductCategory model
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // Display the list of products
    public function index()
    {
        // Fetch all products from the database, optionally paginate them
        $products = Product::all(); // Or use paginate() for pagination: Product::paginate(10);

        // Pass products to the view
        return view('admin.products.manage-product', compact('products'));
    }

    // Show form to create or edit a product
    public function createOrEdit($id = null)
    {
        $product = $id ? Product::findOrFail($id) : new Product(); // If $id is provided, edit, else add new
        $categories = ProductCategory::all();

        return view('admin.products.add-product', compact('product', 'categories'));
    }

    // Handle the form submission to store the product
    
    // Store or update the product
    public function storeOrUpdate(Request $request, $id = null)
    {
        // Validation
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_category' => 'required|exists:product_categories,id',
            'product_description' => 'nullable|string',
            'product_price' => 'required|numeric',
            'product_image' => 'nullable|image|max:2048',
        ]);
    
        // If updating an existing product, find the product, otherwise create a new instance
        $product = $id ? Product::findOrFail($id) : new Product();
    
        // Update or set fields
        $product->name = $request->input('product_name');
        $product->description = $request->input('product_description');  // Corrected 'description'
        $product->price = $request->input('product_price');  // Corrected 'price'
        $product->category_id = $request->input('product_category');  // Corrected 'category_id'
    
        // Handle image upload if a new image is uploaded
        if ($request->hasFile('product_image')) {
            // Delete old image if exists
            if ($product->image_url && Storage::exists('public/' . $product->image_url)) {
                Storage::delete('public/' . $product->image_url);
            }
    
            // Store new image
            $imagePath = $request->file('product_image')->store('products', 'public');
            $product->image_url = $imagePath;
        }



        
        
        // Save the product (either add a new one or update the existing)
        $product->save();
    
        // Redirect to the product list with a success message
        return redirect()->route('admin.products.manage-product')->with('success', $id ? 'Product updated successfully!' : 'Product added successfully!');
    }


    // Delete a product
    public function delete($id)
    {
        // Find the product by id
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect with success message
        return redirect()->route('admin.products.manage-product')->with('success', 'Product deleted successfully!');
    }

}
