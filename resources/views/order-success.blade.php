<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Success</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Countdown timer for redirection
        let countdownTime = 10; // 10 seconds countdown

        function updateCountdown() {
            document.getElementById('countdown').textContent = countdownTime;
            countdownTime--;

            if (countdownTime < 0) {
                // Redirect after countdown finishes
                window.location.href = "{{ route('home') }}";
            }
        }

        // Update countdown every second
        setInterval(updateCountdown, 1000);
    </script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                <h1 class="text-4xl font-semibold text-center text-gray-800">Order Success!</h1>
            </div>
            <h2 class="text-2xl font-medium text-gray-800">Thank you for your order!</h2>
            <p class="text-gray-500 text-sm mt-2">We have received your order and will process it shortly.</p>

            <div class="mt-4">
                <span class="text-xl font-semibold text-gray-800">Order Summary:</span>
                <ul class="mt-2">
                    <li><strong>Product:</strong> {{ $order->product->name }}</li>
                    <li><strong>Price:</strong> ${{ number_format($order->total_price, 2) }}</li>
                </ul>
            </div>

            <!-- Countdown Timer Message -->
            <div class="mt-6 text-center">
                <p class="text-lg font-medium text-gray-700">You will be redirected to the homepage in <span id="countdown" class="font-bold text-blue-600">10</span> seconds.</p>
            </div>

            <!-- Return to Home Button (Optional) -->
            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="bg-blue-500 text-white py-2 px-6 rounded-full hover:bg-blue-600 transition">Return to Home</a>
            </div>
        </div>
    </div>
</body>

</html>
