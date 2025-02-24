<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">


    <!-- Main Checkout Section -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-semibold mb-6 text-center text-gray-800">Checkout</h1>

        <!-- Checkout Details -->
        @if ($cart)
            <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
                <!-- Product Image (Fixed size) -->
                <img src="{{ asset('storage/' . $cart->image_url) }}" alt="{{ $cart->name }}" class="h-48 object-fit rounded-md mx-auto mb-6">

                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div>
                            <h2 class="text-2xl font-medium text-gray-800">{{ $cart->name }}</h2>
                            <p class="text-gray-500 text-sm mt-2">{{ Str::limit($cart->description, 100) }}</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <span class="text-2xl font-semibold text-gray-800">${{ number_format($cart->price, 2) }}</span>
                </div>

                <!-- Payment Information Form -->
                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-gray-800">Payment Information</h3>
                    <form action="{{ route('process-order') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-full mt-4">Place Order</button>
                    </form>
                </div>
            </div>
        @else
            <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
                <p class="text-lg text-center text-gray-600">No product in the cart. Please go back and add a product to your cart.</p>
            </div>
        @endif
    </div>

</body>
</html>
