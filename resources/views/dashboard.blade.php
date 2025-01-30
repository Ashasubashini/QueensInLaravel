<x-navbar /> <!-- ✅ Include Custom Navbar -->

<x-app-layout>
   
    @if(auth()->user()->role === 'admin')
        @include('admin-dashboard')
    @else
        @include('user.dashboard') 
    @endif
    
</x-app-layout>
