@extends('layouts.admin')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-6">Order #{{ $order->id }}</h3>

                    <div class="space-y-4">
                        <p><strong>Customer:</strong> {{ $order->user->name }}</p>
                        <p><strong>Product:</strong> {{ $order->product->name }}</p>
                        <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                        <p><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>

                        <h4 class="font-medium text-lg">Shipping Address:</h4>
                        <p>{{ $order->user->address }}</p>
                    </div>

                    <!-- Back to Orders -->
                    <div class="mt-6">
                        <a href="{{ route('admin.orders.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400">
                            Back to Orders List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
