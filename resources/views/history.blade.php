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
                <img src="{{ asset('images/historymain.jpg') }}" alt="about" class="w-full h-full object-cover brightness-50">
            </div>
        
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-8xl font-bold text-white text-center">
                    Early years<br>
                    1956
                </h1>
            </div>
        </div>
        
        
        <section>
            <div class="flex items-center justify-between w-full py-12 px-6">
                <!-- Left Side: Content Text -->
                <div class="max-w-2xl text-black-600 text-2xl leading-relaxed">
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
    
                <div class="flex-shrink-0 w-full md:w-1/3">  
                    <img class="w-full h-96 object-cover rounded-lg shadow-lg"
                        src="{{ asset('images/oldman.jpg') }}" alt="about">
                </div> 
            </div>
            <div class="bg-gray-800 text-white shadow-lg rounded-lg overflow-hidden flex">
        
                <!-- Left Side: Logo -->
                <div class="w-1/3 p-6">
                    <img class="w-full h-auto" src="{{ asset('images/logo2.png') }}" alt="Logo">
                </div>
        
                <!-- Right Side: Story -->
                <div class="w-2/3 p-6">
                    <h2 class="text-3xl font-bold text-emerald-600 mb-4">The Story Behind Our Logo</h2>
                    <p class="text-lg leading-relaxed text-gray-300">
                        The Queens Watches logo is more than just a symbol; it represents the timeless elegance and heritage 
                        of luxury watchmaking. Inspired by the vision of Mr. George Andrews, our logo embodies the fusion of 
                        tradition and innovation. The bold crown design signifies the brand’s royal heritage, while the clean lines 
                        and modern font reflect the future of watchmaking. The choice of colors – emerald green and gold – symbolizes 
                        sophistication and prestige. This logo is a testament to the rich history of Queens Watches and its commitment 
                        to quality and excellence.
                    </p>
                </div>
            </div>
        </section>  
        @include('components.footer')

    </div>
    
</body>

</html>
