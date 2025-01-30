<!-- resources/views/components/navbar.blade.php -->
<nav class="flex items-center justify-between px-6 py-3 bg-emerald-600">
    <!-- Left: Dropdown Menu -->
    <div x-data="{ open: false }" class="relative">
        <!-- Menu Button with Icons -->
        <button @click="open = !open" class="flex items-center gap-2 px-4 py-2 text-white hover:bg-emerald-700 rounded-md focus:outline-none">
            <div class="flex items-center">
                <!-- Menu Icon -->
                <svg x-show="!open" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <!-- Close Icon -->
                <svg x-show="open" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span class="ml-2 text-white">Menu</span>
            </div>
        </button>

        <!-- Dropdown Menu -->
        <div x-show="open" 
             @click.away="open = false"
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="transform opacity-0 scale-95"
             x-transition:enter-end="transform opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="transform opacity-100 scale-100"
             x-transition:leave-end="transform opacity-0 scale-95"
             class="absolute left-0 z-50 w-48 py-2 mt-2 bg-white rounded-lg shadow-xl">
            <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50">Home</a>
            <a href="/about" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50">About</a>
            <a href="/service" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50">Service& Care</a>
            <a href="/watchmaking" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50">Watch Making</a>
        </div>
    </div>

    <!-- Center: Logo -->
    <div class="absolute left-1/2 transform -translate-x-1/2">
        <a href="/">
            <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-10">
        </a>
    </div>

    <!-- Right: Login/Registration -->
    <div class="flex items-center space-x-4 z-50">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" 
                   class="px-6 py-2 text-sm font-medium text-emerald-600 bg-white rounded-full hover:bg-gray-50 transition duration-150 ease-in-out">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="px-6 py-2 text-sm font-medium text-emerald-600 bg-white rounded-full hover:bg-gray-50 transition duration-150 ease-in-out">
                    Login
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" 
                       class="px-6 py-2 text-sm font-medium text-white bg-emerald-800 rounded-full hover:bg-emerald-700 transition duration-150 ease-in-out">
                        Register
                    </a>
                @endif
            @endauth
        @endif
    </div>
</nav>