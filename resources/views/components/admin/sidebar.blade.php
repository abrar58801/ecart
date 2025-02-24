<div class="bg-gray-800 text-white w-64 h-screen">
    <div class="px-6 py-4">
        <h1 class="text-2xl font-semibold text-white">Admin Panel</h1>
    </div>
    <ul class="space-y-4 mt-6">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="text-white hover:bg-gray-700 px-4 py-2 block rounded-md">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.manage-product') }}" class="text-white hover:bg-gray-700 px-4 py-2 block rounded-md">
                Manage Products
            </a>
        </li>
        <li>
            <a href="{{ route('admin.manage-category') }}" class="text-white hover:bg-gray-700 px-4 py-2 block rounded-md">
                Manage Categories
            </a>
        </li>
        <li>
            <a href="{{ route('admin.orders.index') }}" class="text-white hover:bg-gray-700 px-4 py-2 block rounded-md">
                Manage Orders
            </a>
        </li>
    </ul>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left text-white bg-red-700 hover:bg-red-700 px-4 py-2 block rounded-md">
            {{ __('Log Out') }}
        </button>
    </form>
</div>
