<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Admin Dashboard</h2>

            <p>Welcome, {{ auth()->user()->name }}!</p>

            <!-- User List Card -->
            <div class="bg-white shadow-md rounded-lg mb-6 p-6">
                <h3 class="text-xl font-semibold mb-4">User List</h3>
                {{-- Include user list --}}
                @include('admin.userlist')
            </div>

            <!-- Product List Card -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">Product List</h3>
                <a href="{{ route(name: 'admin.addProduct') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                    Add Product
                </a>
                @include('admin.productlist')
            </div>
        </div>
    </div>
</div>
