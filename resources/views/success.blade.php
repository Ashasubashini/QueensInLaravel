<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Successful</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="relative min-h-screen bg-gray-50">
        <!-- Navbar -->
        <div class="fixed top-0 left-0 right-0 z-50">
            <x-navbar />
        </div>

        <!-- Main Content -->
        <div class="pt-16">
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                    <!-- Success Header -->
                    <div class="bg-green-50 px-8 py-6 border-b border-green-100">
                        <div class="flex items-center justify-center">
                            <div class="bg-green-100 rounded-full p-3">
                                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <h1 class="text-3xl font-bold text-center text-gray-900 mt-4">Payment Successful!</h1>
                        <p class="text-center text-gray-600 mt-2">Thank you for your purchase. Your order has been confirmed.</p>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>