@foreach ($products as $product)
    <div class="product-card">
        <h3>{{ $product->name }}</h3>
        <p>${{ $product->price }}</p>
        
        <!-- Buy Now form -->
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="product_ids[]" value="{{ $product->id }}">
            <button type="submit">Buy Now</button>
        </form>
    </div>
@endforeach