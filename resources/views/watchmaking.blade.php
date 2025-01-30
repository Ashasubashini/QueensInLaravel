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
                <img src="{{ asset('images/Watchmaking.jpg') }}" alt="watchmaking" class="w-full h-full object-cover brightness-50">
            </div>
        
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-8xl font-bold text-white text-center">
                    the art of<br>
                    crafting time
                </h1>
            </div>
        </div>
        
        <section class="max-w-7xl mx-auto py-12">
            <div>
                <p class="text-emerald-600 text-2xl text-left leading-relaxed">
                    The Art of Crafting Time encapsulates the mastery and dedication required to 
                    bring timepieces to life. Each watch is a symphony of precision, where skilled 
                    artisans meticulously assemble intricate components to create a harmonious 
                    blend of form and function. From the delicate gears that dance in perfect 
                    synchrony to the elegant design that graces the wrist, every detail is 
                    meticulously crafted to stand the test of time.
                </p>
            </div>

            <!-- First set of image and text (Image on the left, Text on the right) -->
            <div class="flex items-center mt-12">
                <!-- Image on the left -->
                <div class="flex-shrink-0 w-full md:w-1/3">
                    <img class="w-full h-96 object-cover rounded-lg shadow-lg"
                        src="{{ asset('images/watchmakin1.jpg') }}" alt="watchmaking">
                </div>

                <!-- Paragraph on the right -->
                <div class="ml-8 max-w-2xl text-black-600 text-1xl leading-relaxed">
                    <p class="text-left">
                        Step into the elegant world of Mr. George Andrews,
                        a visionary figure in the bustling streets 
                        of 1956 Colombo, Sri Lanka. Known for his impeccable taste 
                        and refined style, 
                        Mr. Andrews's influence resonates through time, inspiring the 
                        luxurious essence of Queens brand. Imagine the vibrant 
                        tapestries of Colombo's markets, the rich scents
                        of spices lingering in the air, and the graceful charm of a 
                        bygone era, all encapsulated in every exquisite piece offered 
                        by Queens. Join us on a journey through history and luxury, 
                        where the spirit of Mr. 
                        George Andrews lives on in each handcrafted creation, 
                        embodying sophistication and timeless elegance.
                    </p>
                </div>
            </div>

            <!-- Second set of image and text (Image on the left, Text on the right) -->
            <div class="flex items-center mt-12">
                <div class="ml-8 max-w-2xl text-black-600 text-1xl leading-relaxed">
                    <p class="text-left">
                        In each and every domain, we observe, 
                            understand and support human movement, 
                            from the most intrepid to the most day to 
                            day. And we adapt our watch casings and 
                            calibers to it, from the most pared-down to 
                            the most elaborate. To us, these mechanics, 
                            human and horological, work hand in hand.
                    </p>
                </div>
                <!-- Image on the left -->
                <div class="flex-shrink-0 w-full md:w-1/3">
                    <img class="w-full h-96 object-cover rounded-lg shadow-lg"
                        src="{{ asset('images/old.jpg') }}" alt="old">
                </div>

                <!-- Paragraph on the right -->
                
            </div>

        </section>  

        @include('components.footer')
    </div>
</body>

</html>
