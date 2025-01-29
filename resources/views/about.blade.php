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


<body class="font-sans antialiased">
    <div class="relative min-h-screen">
        <div class="fixed top-0 left-0 right-0 z-50">
            <x-navbar />
        </div>

        <!-- Content container -->
        <div class="relative w-full" style="height: 600px; max-height: 600px; overflow: hidden;">
            <div class="relative w-full h-full">
                <img src="{{ asset('images/AboutUsmain.jpg') }}" alt="about" class="w-full h-full object-cover brightness-50">
            </div>
        
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-8xl font-bold text-white text-center">
                    About Us
                </h1>
            </div>
        </div>
        
        
        <section>
            <div class="max-w-3xl mx-auto py-12">
                <p class="text-emerald-600 text-2xl text-left leading-relaxed">
                    At Queens, We curate timepieces that blend elegance and innovation, 
                    embodying the essence of opulence and precision. Each watch in our 
                    collection is a masterpiece of craftsmanship, designed to elevate your 
                    style and make statement of sophistication. Explore our exquisite 
                    range and embrace the art of luxury timekeeping
                </p>
            </div>
            <div class="relative w-3/4 mx-auto">
                <!-- Darkened Image -->
                <div class="relative">
                    <img class="w-full h-80 object-cover rounded-lg shadow-lg brightness-50" 
                         src="{{ asset('images/History.jpg') }}" alt="about">
                    
                    <!-- Text and Button (Bottom-Left) -->
                    <div class="absolute bottom-6 left-6">
                        <h2 class="text-white text-2xl font-bold mb-2">History</h2>
                        <a href="{{ route('history') }}" 
                           class="text-white text-lg font-semibold border border-white px-6 py-2 rounded-lg hover:bg-white hover:text-black transition">
                            Discover More
                        </a>
                    </div>
                </div>
            </div>
        </section>  
        @include('components.footer')

    </div>
    
</body>

</html>
