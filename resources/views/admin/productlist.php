<div class="mt-4">
    <h3 class="text-xl font-semibold">All Products</h3>

    <table class="min-w-full mt-4">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Small Description</th>
                <th class="px-6 py-3 text-left">Large Description</th>
                <th class="px-6 py-3 text-left">Price</th>
                <th class="px-6 py-3 text-left">Quantity</th>
                <th class="px-6 py-3 text-left">Image</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="px-6 py-4">{{ $product->name }}</td>
                    <td class="px-6 py-4">{{ $product->small_description }}</td>
                    <td class="px-6 py-4">{{ $product->large_description }}</td>
                    <td class="px-6 py-4">{{ $product->price }}</td>
                    <td class="px-6 py-4">{{ $product->quantity }}</td>
                    <td class="px-6 py-4">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover">
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('admin.removeProduct', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
