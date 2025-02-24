<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <style>
                        .container {
                            width: 80%;
                            margin: 30px auto;
                        }table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 20px;
                        }

                        table,
                        th,
                        td {
                            border: 1px solid #ddd;
                        }

                        th,
                        td {
                            padding: 12px;
                            text-align: left;
                        }

                        th {
                            background-color: #4CAF50;
                            color: white;
                        }

                        td img {
                            width: 100px;
                            height: auto;
                            border-radius: 5px;
                        }

                        .price {
                            font-weight: bold;
                            color: #333;
                        }

                        .add-to-cart {
                            background-color: #28a745;
                            color: white;
                            padding: 8px 15px;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                        }

                        .add-to-cart:hover {
                            background-color: #218838;
                        }
                    </style>

                    <h2>{{ __('Product List') }}</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="path/to/image1.jpg" alt="Product 1"></td>
                                <td>Product 1 Name</td>
                                <td>Description of product 1.</td>
                                <td class="price">$19.99</td>
                                <td><button class="add-to-cart">Add to Cart</button></td>
                            </tr>
                            <tr>
                                <td><img src="path/to/image2.jpg" alt="Product 2"></td>
                                <td>Product 2 Name</td>
                                <td>Description of product 2.</td>
                                <td class="price">$29.99</td>
                                <td><button class="add-to-cart">Add to Cart</button></td>
                            </tr>
                            <tr>
                                <td><img src="path/to/image3.jpg" alt="Product 3"></td>
                                <td>Product 3 Name</td>
                                <td>Description of product 3.</td>
                                <td class="price">$39.99</td>
                                <td><button class="add-to-cart">Add to Cart</button></td>
                            </tr>
                            <!-- Add more products here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
