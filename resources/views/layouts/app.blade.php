<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Alpine.js for animations -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <x-banner />

        <div class="min-h-screen">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content with Animation -->
            <main>
                <div class="max-w-7xl mx-auto p-6">
                    {{ $slot }}
                </div>

                <!-- Product Section with Scroll Animation -->
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
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
