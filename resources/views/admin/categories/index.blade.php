@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Manage Categories') }}
                        </h2>

                        <!-- Add Product Button aligned to the right -->
                        <a href="{{ route('admin.category.create') }}" class="inline-block px-6 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-green-400">
                            Create New Category
                        </a>
                    </div>


                    <!-- Categories Table -->
                    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
                        <br />
                        <table class="min-w-full bg-white dark:bg-gray-800">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Category Name</th>
                                    <th class="py-3 px-4 text-right text-sm font-medium text-gray-600 dark:text-gray-200">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="py-3 px-4 text-sm text-gray-800 dark:text-gray-100">{{ $category->name }}</td>
                                        <td class="py-3 px-4 text-right">
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.category.edit', $category->id) }}" class="text-blue-600 hover:text-blue-500 font-semibold">
                                                Edit
                                            </a>
                                            <!-- Delete Form -->
                                            <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" class="inline-block ml-4">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-500 font-semibold">
                                                    Delete
                                                </button>
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
    </div>
@endsection