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
@extends('layouts.app')



<body class="font-sans antialiased">
    <div class="relative min-h-screen">
        <div class="fixed top-0 left-0 right-0 z-50">
            <x-navbar />
        </div>

        <!-- Content container -->
        <div class="relative w-full">
            <!-- Video section with no top margin -->
            <div class="w-full h-screen">
                <video class="w-full h-full object-cover" autoplay muted loop>
                    <source src="{{ asset('images/Welcome.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>

        @section('content')
            <section class="max-w-7xl mx-auto py-12" x-data>
                @foreach ($products as $product)
                    <div 
                        class="relative overflow-hidden transform transition-all duration-700 ease-in-out opacity-0 translate-y-10"
                        x-intersect.once="$el.classList.remove('opacity-0', 'translate-y-10')"
                    >
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-lg shadow-lg">
                        <div class="mt-6 text-center">
                            <h2 class="text-2xl font-semibold text-gray-900">{{ $product->name }}</h2>
                            <p class="text-gray-600 mt-2">{{ $product->small_description }}</p>
                            <a href="{{ route('product.show', $product->id) }}" class="mt-4 inline-block bg-black text-white px-6 py-2 rounded-full hover:bg-gray-800 transition">
                                Discover More
                            </a>
                        </div>
                    </div>
                @endforeach
            </section>
        @endsection

    </div>
    <div>
        
    </div>
</body>

</html>
