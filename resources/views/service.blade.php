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
                <img src="{{ asset('images/servicemain.jpg') }}" alt="about" class="w-full h-full object-cover brightness-50">
            </div>
        
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-8xl font-bold text-white text-center">
                    Expert care &<br>
                    Timeless service
                </h1>
            </div>
        </div>
        
        
        <section class="max-w-7xl mx-auto py-12">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <h1 class="text-4xl md:text-5xl font-bold text-emerald-600 w-full md:w-1/2 text-left">
                    Queens watches are <br>
                    designed and built to 
                    last
                </h1>
        
                <p class="text-gray-700 text-lg w-full md:w-1/2 mt-4 md:mt-0 text-left">
                    "Service and care are at the heart of 
                        everything we do. We strive to provide 
                        exceptional service with a personal touch, 
                        ensuring that your needs are met with 
                        compassion and attention to detail. Your 
                        satisfaction and well-being are our top 
                        priorities, and we are committed to going 
                        above and beyond to exceed 
                        your expectations."
                </p>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mt-12 p-6">
                <div class="flex flex-wrap justify-between">
                    <!-- First Image -->
                    <div class="w-full md:w-1/2 p-4">
                        <img class="w-full h-80 object-cover rounded-lg" 
                             src="{{ asset('images/service2.jpg') }}" alt="Service Image 1">
                    </div>

                    <!-- Second Image -->
                    <div class="w-full md:w-1/2 p-4">
                        <img class="w-full h-80 object-cover rounded-lg" 
                             src="{{ asset('images/service.jpg') }}" alt="Service Image 2">
                    </div>
                </div>
            </div>
            <div class="max-w-3xl mx-auto py-12">
                <p class="text-emerald-600 text-2xl text-left leading-relaxed">
                    We provide the best possible servicing and so preserve their 
                    excellent technical performance and pristine appearance. As 
                    a result, there is no limit on how long a Rolex watch can keep 
                    working, being handed down from one generation to the 
                    next, and living several lives
                </p>
            </div>
            
        </section>  
        @include('components.footer')

    </div>
    
</body>

</html>
