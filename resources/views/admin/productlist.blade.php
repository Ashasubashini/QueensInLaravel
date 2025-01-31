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
                        <!-- Edit Button -->
                        <a href="{{ route('product.editProduct', $product->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>

                        <!-- Remove Button -->
                        <form action="{{ route('admin.removeProduct', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                                Remove
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
