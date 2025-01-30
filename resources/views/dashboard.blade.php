<x-app-layout>
   
    @if(auth()->user()->role === 'admin')
        <p>Welcome, Admin!</p>
    @else
        <p>Welcome, User!</p>
    @endif
    
</x-app-layout>
