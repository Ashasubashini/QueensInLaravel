@foreach ($products as $product)
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <input type="hidden" name="product_ids[]" value="{{ $product->id }}">
        <button type="submit">Checkout</button>
    </form>
@endforeach