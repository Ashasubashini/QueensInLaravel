<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Admin Dashboard</h2>

            <p>Welcome, {{ auth()->user()->name }}!</p>

            {{-- Include user list --}}
            @include('admin.userlist')

            {{-- Include product list --}}
            @include('admin.productlist')
        </div>
    </div>
</div>
