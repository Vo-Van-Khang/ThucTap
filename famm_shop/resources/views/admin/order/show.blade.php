@extends('admin.layoutadmin.master')

@section('content')
<div class="container mt-4">
    <h1>Order Details</h1>

    <h4>Order Information</h4>
    <ul>
        <li><strong>Order Number:</strong> {{ $order->order_number }}</li>
        <li><strong>Status:</strong> {{ ucfirst($order->status) }}</li>
        <li><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</li>
        <li><strong>Created At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</li>
    </ul>

    <h4>Customer Information</h4>
    <ul>
        <li><strong>Name:</strong> {{ $order->name }}</li>
        <li><strong>Email:</strong> {{ $order->email }}</li>
        <li><strong>Phone:</strong> {{ $order->phone }}</li>
        <li><strong>Shipping Address:</strong> {{ $order->shipping_address }}</li>
    </ul>

    <h4>Order Items</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderDetails as $detail)
                <tr>
                    <td>{{ $detail->product->name ?? 'Deleted Product' }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>${{ number_format($detail->price, 2) }}</td>
                    <td>${{ number_format($detail->quantity * $detail->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
</div>
@endsection
