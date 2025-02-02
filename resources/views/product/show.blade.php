<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="relative min-h-screen bg-gray-50">
        <div class="fixed top-0 left-0 right-0 z-50">
            <x-navbar />
        </div>

        <div class="pt-16"> 
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                    <div class="md:flex">
                        <div class="md:w-1/2 p-8">
                            <img class="product w-full h-96 object-cover rounded-lg shadow-lg" 
                                src="{{ Storage::url($product->image) }}" 
                                alt="{{ $product->name }}">

                            <h1 class="text-4xl font-semibold text-gray-900 mb-4">
                                {{ $product->name }}
                            </h1>
                            <p class="text-lg text-gray-600 mb-4">
                                {{ $product->small_description }}
                            </p>

                            <div class="flex items-center justify-between mb-6">
                                <span class="text-3xl font-semibold text-gray-900">
                                    ${{ $product->price }}
                                </span>
                                <span class="text-lg 
                                    @if($product->quantity == 0) text-red-500 font-semibold @elseif($product->quantity < 5) text-red-500 @else text-gray-600 @endif">
                                    @if($product->quantity == 0)
                                        Out of Stock
                                    @else
                                        Available: <span class="font-semibold">{{ $product->quantity }}</span>
                                    @endif
                                </span>
                            </div>

                            <!-- Quantity Control -->
                            <div class="mb-6">
                                <label for="quantity" class="text-lg font-semibold">Quantity</label>
                                <input id="quantity" type="number" min="1" max="{{ $product->quantity }}" value="1" class="mt-2 p-2 border border-gray-300 rounded-lg w-full">
                            </div>

                            <!-- Error Message -->
                            <div id="error-message" class="text-red-500 hidden mb-4">
                                You can't add more than 3 items to the cart.
                            </div>
                            <div class="flex items-center justify-between mb-6">
                                <span class="text-3xl font-semibold text-gray-900">
                                    Price: ${{ $product->price }}
                                </span>
                                <span class="text-3xl font-semibold text-green-600">
                                    Total: <span id="total-price">${{ $product->price }}</span>
                                </span>
                            </div>

                            <div class="flex space-x-4">
                                <button type="button" id="add-to-cart" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-200 transform hover:scale-105">
                                    Add to Cart
                                </button>
                                
                                <form action="{{ route('checkout') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" id="checkout-quantity" name="quantity" value="1"> <!-- Dynamically update this value -->
                                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md">
                                        Buy Now
                                    </button>
                                </form>
                                
                            </div>
                        </div>

                        <!-- Right Side: Large Description -->
                        <div class="md:w-1/2 p-8">
                            <div class="space-y-6">
                                <p class="text-lg text-gray-700">
                                    {{ $product->large_description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInput = document.getElementById('quantity');
        const totalPriceElement = document.getElementById('total-price');
        const addToCartButton = document.getElementById('add-to-cart');
        const buyNowButton = document.getElementById('buy-now');
        const errorMessage = document.getElementById('error-message');
        const checkoutQuantityInput = document.getElementById('checkout-quantity'); // Get the hidden input
        
        const productPrice = parseFloat("{{ $product->price }}"); // Get product price from backend
        const maxQuantity = parseInt("{{ $product->quantity }}"); // Get available stock

        // Function to update total price
        function updateTotalPrice() {
            let quantity = parseInt(quantityInput.value);

            if (isNaN(quantity) || quantity < 1) {
                quantity = 1; // Default to 1 if invalid
                quantityInput.value = 1;
            }

            if (quantity > maxQuantity) {
                quantity = maxQuantity; // Prevent exceeding stock
                quantityInput.value = maxQuantity;
            }

            const total = productPrice * quantity;
            totalPriceElement.textContent = `$${total.toFixed(2)}`; // Update total price
            
            // Update the hidden input with the current quantity
            checkoutQuantityInput.value = quantity;
        }

        // Listen for quantity change
        quantityInput.addEventListener('input', updateTotalPrice);

        // Add to Cart Button Click
        addToCartButton.addEventListener('click', function () {
            let quantity = parseInt(quantityInput.value);

            if (quantity > 3) {
                errorMessage.classList.remove('hidden');
            } else {
                errorMessage.classList.add('hidden');

                fetch("{{ route('cart.add') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        product_id: "{{ $product->id }}",
                        quantity: quantity,
                        total_price: productPrice * quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message); 
                })
                .catch(error => console.error('Error:', error));
            }
        });

        // Buy Now Button Click
        buyNowButton.addEventListener('click', function () {
            let quantity = parseInt(quantityInput.value);

            if (quantity > maxQuantity) {
                alert('Quantity not available');
                return;
            }

            if (quantity > 3) {
                errorMessage.classList.remove('hidden');
                return;
            }

            document.getElementById('checkout-quantity').value = quantity;
            document.getElementById('checkout-form').submit();
        });

        // Initialize total price on page load
        updateTotalPrice();
    });

    
</script>   
</body>
</html>

