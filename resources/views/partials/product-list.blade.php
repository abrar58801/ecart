<!-- resources/views/partials/product-list.blade.php -->

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    @foreach($products as $product)
        <div class="bg-white p-4 rounded-lg shadow-lg transition-transform transform hover:scale-105">
            <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md mb-4">
            <h2 class="text-xl font-medium text-gray-800">{{ $product->name }}</h2>
            <p class="text-gray-500 mt-2">{{ Str::limit($product->description, 100) }}</p>
            <div class="mt-4 flex justify-between items-center">
                <span class="text-lg font-semibold text-gray-800">${{ number_format($product->price, 2) }}</span>
                <button class="bg-blue-500 text-white py-2 px-4 rounded-full mt-2">Add to Cart</button>
            </div>
        </div>
    @endforeach
</div>
