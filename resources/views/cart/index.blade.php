<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-3xl font-semibold mb-6">Your Cart</h1>

    @if ($cartItems->isEmpty())
        <p class="text-gray-600">Your cart is empty.</p>
    @else
        <div class="bg-white rounded-lg shadow-lg p-6">
            @foreach ($cartItems as $item)
                <div class="flex justify-between items-center border-b pb-4 mb-4">
                    <div class="flex items-center">
                        <img src="{{ asset($item->product->image) }}" class="w-20 h-20 object-cover rounded-lg">
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold">{{ $item->product->name }}</h2>
                            <p class="text-gray-600">${{ $item->product->price }} x {{ $item->quantity }}</p>
                        </div>
                    </div>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                            Remove
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
</div>
