<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 14px;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .details, .summary {
            margin-bottom: 20px;
        }
        .details table, .summary table {
            width: 100%;
            border-collapse: collapse;
        }
        .details table td, .summary table td {
            padding: 5px;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .items-table th, .items-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .items-table th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
        .total {
            font-weight: bold;
            font-size: 16px;
        }
        .qr-code {
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('imgs/logo-white.png') }}" alt="Logo" style="width: 200px; margin-bottom: 20px;">
            <h1>Invoice</h1>
            <div class="invoice-details">
                <p><strong>Invoice #:</strong> {{ $order->id }}</p>
                <p><strong>Date:</strong> {{ now()->format('Y-m-d') }}</p>
                <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
                <p><strong>Tracking #:</strong> {{ $order->track_number }}</p>
            </div>
            <div class="qr-code">
                <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code">
            </div>
        </div>

        <div class="details">
            <table>
                <tr>
                    <td style="width: 50%;">
                        <strong>Billed To:</strong><br>
                        {{ $order->name }}<br>
                        {{ $order->email }}<br>
                        {{ $order->phone }}
                    </td>
                    <td style="width: 50%;" class="text-right">
                        <strong>Shipping From:</strong><br>
                        {{ $order->up_address }}, {{ $order->up_state ?: $order->up_city }} {{ $order->up_zip_code }}<br>
                        <strong>Shipping To:</strong><br>
                        {{ $order->deliver_address }}, {{ $order->deliver_state ?: $order->deliver_city }} {{ $order->deliver_zip_code }}
                    </td>
                </tr>
            </table>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->key }}</td>
                    <td>{{ $item->count }}</td>
                    <td class="text-right">${{ number_format($item->price, 2) }}</td>
                    <td class="text-right">${{ number_format($item->price * $item->count, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="summary">
             <table style="margin-top: 20px;">
                <tr>
                    <td style="width: 80%;" class="text-right"><strong>Subtotal:</strong></td>
                    <td style="width: 20%;" class="text-right">${{ number_format($subtotal, 2) }}</td>
                </tr>
                <tr>
                    <td class="text-right"><strong>Insurance:</strong></td>
                    <td class="text-right">${{ number_format($order->insurance, 2) }}</td>
                </tr>
                @if($order->discount_amount > 0)
                <tr style="color: #4caf50;">
                    <td class="text-right">
                        <strong>Discount
                        @if($order->discount_type === 'percent')
                            ({{ number_format($order->discount_value, 0) }}%)
                        @endif
                        :</strong>
                    </td>
                    <td class="text-right">-${{ number_format($order->discount_amount, 2) }}</td>
                </tr>
                @endif
                @if($stripeFee > 0)
                <tr>
                    <td class="text-right"><strong>Stripe Fee (3%):</strong></td>
                    <td class="text-right">${{ number_format($stripeFee, 2) }}</td>
                </tr>
                @endif
                 <tr>
                    <td class="text-right total"><strong>Total:</strong></td>
                    <td class="text-right total">${{ number_format($totalPrice, 2) }}</td>
                </tr>
            </table>
        </div>

        {{-- Payment Instructions for Zelle --}}
        @if($order->payment_method === \App\Enums\PaymentMethod::ZELLE)
        <div style="margin: 20px 0; padding: 15px; border: 2px solid #6A1B9A; border-radius: 5px; background-color: #F3E5F5;">
            <h3 style="margin: 0 0 10px 0; color: #6A1B9A;">
                💳 Payment Instructions - Zelle
            </h3>
            <p style="margin: 0; font-size: 14px; line-height: 1.6;">
                <strong>Please pay via Zelle to:</strong><br>
                <span style="font-size: 16px; color: #6A1B9A; font-weight: bold;">dumatransportation@gmail.com</span><br>
                <strong>Amount:</strong> ${{ number_format($totalPrice, 2) }}
            </p>
        </div>
        @endif

        {{-- Prohibited Items Confirmation --}}
        <div class="prohibited-items-section" style="margin: 20px 0; padding: 15px; border: 2px solid {{ $order->no_prohibited_items_confirmed ? '#4caf50' : '#f44336' }}; border-radius: 5px; background-color: {{ $order->no_prohibited_items_confirmed ? '#e8f5e8' : '#ffebee' }};">
            <h3 style="margin: 0 0 10px 0; color: {{ $order->no_prohibited_items_confirmed ? '#2e7d32' : '#c62828' }};">
                <i class="fas fa-shield-alt"></i> Prohibited Items Confirmation
            </h3>
            <p style="margin: 0; font-size: 14px;">
                @if($order->no_prohibited_items_confirmed)
                    <strong style="color: #2e7d32;">✅ CONFIRMED:</strong> Customer confirmed that shipment contains no prohibited items.<br>
                    <strong>Confirmed at:</strong> {{ $order->prohibited_items_confirmed_at ? $order->prohibited_items_confirmed_at->format('M j, Y \a\t g:i A') : 'N/A' }}
                @else
                    <strong style="color: #c62828;">⚠️ NOT CONFIRMED:</strong> This order was created without prohibited items confirmation. Please verify with customer.
                @endif
            </p>
        </div>
    </div>
</body>
</html> 