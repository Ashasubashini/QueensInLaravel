@section('content')
    <div class="container">
        <h1>Orders</h1>

        @if($orders->isEmpty())
            <p>No orders found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Order Date</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td> <!-- Assuming orders have a user relation -->
                            <td>{{ $order->created_at->format('d-m-Y') }}</td>
                            <td>${{ number_format($order->orderItems->sum('total_price'), 2) }}</td> <!-- Assuming total_price is in order_items -->
                            <td>{{ $order->status }}</td> <!-- You can adjust the status field if necessary -->
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection