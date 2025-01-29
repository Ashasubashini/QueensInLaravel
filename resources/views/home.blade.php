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
        <div class="relative w-full">
            <!-- Video section with no top margin -->
            <div class="w-full h-screen">
                <video class="w-full h-full object-cover" autoplay muted loop>
                    <source src="{{ asset('images/Welcome.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
    <div>
        
    </div>
</body>

</html>
