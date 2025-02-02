@section('content')
    <div class="container">
        <h1>Order Details</h1>

        <h3>Order ID: {{ $order->id }}</h3>
        <p>Customer: {{ $order->user->name }}</p>
        <p>Order Date: {{ $order->created_at->format('d-m-Y') }}</p>
        <p>Status: {{ $order->status }}</p>
        
        <h4>Order Items</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->unit_price, 2) }}</td>
                        <td>${{ number_format($item->total_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p><strong>Total Price: ${{ number_format($order->orderItems->sum('total_price'), 2) }}</strong></p>
    </div>
@endsection
