<div>
    <footer class="bg-emerald-600 text-white py-10 mt-12">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start px-6">
            
            <!-- Left Side: Logo & Contact Info -->
            <div class="mb-6 md:mb-0 flex flex-col items-start">
                <!-- Logo -->
                <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="w-40 mb-4">
                
                <!-- Social Media Icons -->
                <div class="flex space-x-4 mb-4">
                    <a href="#" class="text-white text-2xl hover:text-gray-300"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white text-2xl hover:text-gray-300"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white text-2xl hover:text-gray-300"><i class="fab fa-twitter"></i></a>
                </div>
    
                <!-- Contact Info -->
                <p class="text-sm">Email: contact@queenswatches.com</p>
                <p class="text-sm">Phone: +123 456 7890</p>
            </div>
    
            <!-- Right Side: Navigation Links -->
            <div class="flex flex-col space-y-3 text-sm md:text-base items-start">
                <a href="{{ route('home') }}" class="hover:text-gray-300">Home</a>
                <a href="{{ route('about') }}" class="hover:text-gray-300">About Us</a>
                <a href="{{ route('history') }}" class="hover:text-gray-300">History</a>
                <a href="{{ route('service') }}" class="hover:text-gray-300">Service & Care</a>
                <a href="{{ route('watchmaking') }}" class="hover:text-gray-300">Watch Making</a>

            </div>
            
        </div>
    </footer>

    <!-- Copyright Bar -->
    <div class="bg-emerald-700 text-white text-center py-3 text-sm">
        © {{ date('Y') }} Queens Watches. All Rights Reserved.
    </div>

    <!-- FontAwesome Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>
</div>
