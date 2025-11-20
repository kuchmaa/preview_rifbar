<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; font-size: 12px; }
        .container { width: 100%; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; }
        .header p { margin: 5px 0; }
        .details, .items-table { width: 100%; margin-bottom: 20px; border-collapse: collapse; }
        .details th, .details td, .items-table th, .items-table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .details th { background-color: #f2f2f2; }
        .total { text-align: right; margin-top: 20px; }
        .parcel-header { background-color: #eaf6ff; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Invoice</h1>
            <p>Duma Shipping</p>
        </div>

        <table class="details">
            <tr>
                <th>Invoice #</th>
                <td>{{ $order->id }}</td>
                <th>Date</th>
                <td>{{ $order->created_at->format('Y-m-d') }}</td>
            </tr>
            <tr>
                <th>Business</th>
                <td>{{ $order->business->name }}</td>
                <th>Status</th>
                <td>{{ ucfirst($order->status->value) }}</td>
            </tr>
        </table>

        <h2>Order Details</h2>

        @foreach($order->parcels as $index => $parcel)
            <table class="items-table">
                <thead>
                    <tr class="parcel-header">
                        <th colspan="4">Parcel #{{ $index + 1 }}</th>
                    </tr>
                    <tr>
                        <th colspan="2">Recipient: {{ $parcel->recipient_name }}</th>
                        <th colspan="2">Phone: {{ $parcel->recipient_phone ?? 'N/A' }}</th>
                    </tr>
                    <tr>
                        <th colspan="2">Pickup: {{ $parcel->pickup_address }}</th>
                        <th colspan="2">Delivery: {{ $parcel->delivery_address }}</th>
                    </tr>
                    <tr>
                        <th>Item</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($parcel->items as $item)
                        <tr>
                            <td>{{ $item->itemCategory->name }}</td>
                            <td>{{ $item->itemCategory->group }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach

        <div class="total">
            <h3>Total Price: ${{ number_format($order->total_price, 2) }}</h3>
        </div>
    </div>
</body>
</html> 