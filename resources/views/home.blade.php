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

<style>
    @keyframes appear {
        from {
          opacity: 0;
          scale: 0.5;
        }
        to {
          opacity: 1;
          scale: 1;
        }
      }
    
      .product-card{
        animation: appear linear;
        animation-timeline: view();
        animation-range: entry 0% cover 40%;
      }
      .product-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
    }

    .card-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .card-info {
        padding: 20px;
        text-align: center;
    }

    .card-info h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
    }

    .card-info p {
        color: #666;
        font-size: 1rem;
        margin-bottom: 20px;
    }

    .discover-btn {
        background-color: #10B981; /* Emerald Green */
        color: white;
        padding: 10px 20px;
        border-radius: 50px;
        font-size: 1rem;
        font-weight: 600;
        transition: background-color 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .discover-btn:hover {
        background-color: #059669; /* Darker Emerald Green */
    }
</style>
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

        <section class="max-w-7xl mx-auto py-12">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <h1 class="text-4xl md:text-5xl font-bold text-emerald-600 w-full md:w-1/2 text-left">
                    Explore the Queens<br>
                    watch collection
                </h1>
        
                <p class="text-gray-700 text-lg w-full md:w-1/2 mt-4 md:mt-0 text-left">
                    You will discover Queens exudes elegance and luxury. Our timepieces are crafted with
                    precious materials and attention to detail, making them the perfect accessory for those who
                    appreciate sophistication and style.<br><br>
                    Explore our collection and find the ideal watch that complements your unique taste.
                </p>
            </div>
            @foreach ($products as $product)
            <div class="product-card">
                <img class="product w-full h-96 object-cover rounded-lg shadow-lg" 
                    src="{{ asset('storage/' . $product->image) }}" 
                    alt="{{ $product->name }}">                
                <div class="card-info">
                    <h2 class="text-2xl font-semibold text-gray-900">{{ $product->name }}</h2>
                    <p class="text-gray-600 mt-2">{{ $product->small_description }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="discover-btn">
                        Discover More
                    </a>
                </div>
            </div>
            @endforeach
        </section>
        @include('components.footer')

    </div>
    
</body>
</html>
