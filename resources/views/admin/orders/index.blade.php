@extends('layouts.admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-6">Orders List</h3>

                    <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-md rounded-lg">
                        <table class="min-w-full bg-white dark:bg-gray-800">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Order ID</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Customer</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Product</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-600 dark:text-gray-200">Total Price</th>
                                    <th class="py-3 px-4 text-center text-sm font-medium text-gray-600 dark:text-gray-200">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="py-3 px-4 text-sm text-gray-800 dark:text-gray-100">{{ $order->id }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-800 dark:text-gray-100">{{ $order->user->name }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-800 dark:text-gray-100">{{ $order->product->name }}</td>
                                        <td class="py-3 px-4 text-sm text-gray-800 dark:text-gray-100">${{ number_format($order->total_price, 2) }}</td>
                                        <td class="py-3 px-4 text-center">
                                            <!-- View Order -->
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="text-blue-600 hover:text-blue-500 font-semibold">
                                                View
                                            </a>
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