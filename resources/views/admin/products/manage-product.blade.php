@extends('layouts.admin')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Admin Dashboard') }}
    </h2>
@endsection

@section('content')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Product List') }}
                        </h2>

                        <!-- Add Product Button aligned to the right -->
                        <a href="{{ route('admin.product.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-150">
                            + Add New Product
                        </a>
                    </div>
                    <!-- Table for displaying products -->
                    <table class="table-auto w-full border-collapse mt-4">
                        <thead class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                            <tr>
                                <th class="px-4 py-2 text-left">Image</th>
                                <th class="px-4 py-2 text-left">Product Name</th>
                                <th class="px-4 py-2 text-left">Description</th>
                                <th class="px-4 py-2 text-left">Price</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->isEmpty())
                            <tr>
                                <td class="px-4 py-2 text-center" colspan="5">No products found.</td>
                            </tr>
                            @endif
                            @foreach ($products as $product)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-2 text-center">
                                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="img-thumbnail" width="50">
                                </td>
                                <td class="px-4 py-2">{{ $product->name }}</td>
                                <td class="px-4 py-2">{{ Str::limit($product->description, 50) }}</td>
                                <td class="px-4 py-2">₹{{ number_format($product->price, 2) }}</td>
                                <td class="px-4 py-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.product.edit', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-150">Edit</a>

                                    <!-- Delete Button Form -->
                                    <form action="{{ route('admin.product.delete', $product->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-150" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection