<!-- orderslist.blade.php -->
<table class="min-w-full bg-white border border-gray-200">
    <thead>
        <tr>
            <th class="px-4 py-2 text-left">Order ID</th>
            <th class="px-4 py-2 text-left">Customer Name</th>
            <th class="px-4 py-2 text-left">Total</th>
            <th class="px-4 py-2 text-left">Status</th>
            <th class="px-4 py-2 text-left">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $order->id }}</td>
                <td class="px-4 py-2">{{ $order->user->name }}</td>
                <td class="px-4 py-2">${{ $order->total }}</td>
                <td class="px-4 py-2">{{ $order->status }}</td>
                <td class="px-4 py-2">
                    <a href="{{ route('orders.show', $order->id) }}" class="text-blue-500">View</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
