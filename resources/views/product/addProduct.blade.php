<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<div class="py-12 bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-5xl w-full bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Add New Product</h2>

        <form action="{{ route('admin.storeProduct') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="mt-1 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" required>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" class="mt-1 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" required>
                </div>

                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" class="mt-1 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" required>
                </div>
            </div>

            <div>
                <label for="small_description" class="block text-sm font-medium text-gray-700">Small Description</label>
                <textarea id="small_description" name="small_description" rows="3" class="mt-1 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" required>{{ old('small_description') }}</textarea>
            </div>

            <div>
                <label for="large_description" class="block text-sm font-medium text-gray-700">Large Description</label>
                <textarea id="large_description" name="large_description" rows="5" class="mt-1 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition" required>{{ old('large_description') }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                <input type="file" id="image" name="image" class="mt-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-white file:bg-emerald-600 hover:file:bg-emerald-700 transition cursor-pointer">
            </div>

            <div class="mt-6 flex justify-center">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-8 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                    Add Product
                </button>
            </div>
        </form>
    </div>
</div>
