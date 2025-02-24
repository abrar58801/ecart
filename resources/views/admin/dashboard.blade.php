<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.admin')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Admin Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="flex">
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h3 class="text-2xl font-semibold">Welcome to Admin Dashboard</h3>
            <!-- Example of Dashboard Content -->
            <div class="mt-6 grid grid-cols-3 gap-4">
                <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg">
                    <h4 class="text-xl">Total Orders</h4>
                    {{$orders}}
                </div>
                <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg">
                    <h4 class="text-xl">Total Products</h4>
                    {{$products}}
                </div>
                <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-lg">
                    <h4 class="text-xl">Total Categories</h4>
                    {{$categories}}
                </div>
            </div>
        </div>
    </div>
@endsection
