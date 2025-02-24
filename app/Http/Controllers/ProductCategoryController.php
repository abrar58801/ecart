<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Show products by category
    public function show($id)
    {
        $category = ProductCategory::findOrFail($id);
        $products = $category->products;  // Eager load products in the selected category
        return view('categories.show', compact('category', 'products'));
    }



    // Show the form to create a new category or edit an existing one
    public function createOrEdit($id = null)
    {
        if ($id) {
            // Edit existing category
            $category = ProductCategory::findOrFail($id);
        } else {
            // New category
            $category = new ProductCategory();
        }

        // Return the form view with category data if editing
        return view('admin.categories.create', compact('category'));
    }

  


    public function storeOrUpdate(Request $request, $id = null)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        if ($id) {
            // Update existing category
            $category = ProductCategory::findOrFail($id);
            $category->name = $request->category_name;
        } else {
            // Create new category
            $category = new ProductCategory();
            $category->name = $request->category_name;
        }

        $category->save();

        return redirect()->route('admin.manage-category')->with('success', 'Category saved successfully.');
    }

    public function destroy($id)
    {
        // Find the category and delete it
        $category = ProductCategory::findOrFail($id);
        $category->delete();

        // Redirect back to category management with a success message
        return redirect()->route('admin.manage-category')->with('success', 'Category deleted successfully.');
    }
}
