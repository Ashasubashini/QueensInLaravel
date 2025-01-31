<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="relative min-h-screen">
        <div class="fixed top-0 left-0 right-0 z-50">
            <x-navbar />
        </div>

        <div class="container mx-auto mt-12 p-9 bg-white shadow-lg rounded-lg">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Edit Product</h3>

            <form action="{{ route('admin.updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="mt-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
                </div>

                <!-- Small Description -->
                <div class="mt-6">
                    <label for="small_description" class="block text-sm font-medium text-gray-700">Small Description</label>
                    <textarea id="small_description" name="small_description" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ old('small_description', $product->small_description) }}</textarea>
                </div>

                <!-- Large Description -->
                <div class="mt-6">
                    <label for="large_description" class="block text-sm font-medium text-gray-700">Large Description</label>
                    <textarea id="large_description" name="large_description" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">{{ old('large_description', $product->large_description) }}</textarea>
                </div>

                <!-- Price -->
                <div class="mt-6">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
                </div>

                <!-- Quantity -->
                <div class="mt-6">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500" required>
                </div>

                <!-- Image -->
                <div class="mt-6">
                    <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input type="file" id="image" name="image" class="mt-1 p-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    @if($product->image)
                        <p class="mt-2 text-sm text-gray-500">Current image:</p>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover mt-2 rounded-lg border border-gray-200">
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="mt-8 flex justify-end">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500">Update Product</button>
                </div>
            </form>

        </div>
    </div>
</body>

</html>
