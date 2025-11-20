<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ public_path('images/logo.png') }}" style="width:100%; max-width:300px;">
                            </td>
                            <td>
                                Invoice #: {{ $invoice->invoice_number }}<br>
                                Created: {{ $invoice->issue_date->format('F j, Y') }}<br>
                                Due: {{ $invoice->due_date->format('F j, Y') }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Duma Shipping, Inc.<br>
                                12345 Street Name<br>
                                City, State, 12345
                            </td>
                            <td>
                                {{ $invoice->business->name }}<br>
                                {{ $invoice->business->user->name }}<br>
                                {{ $invoice->business->user->email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Payment Method
                </td>
                <td>
                    Check #
                </td>
            </tr>
            <tr class="details">
                <td>
                    Zelle or Cash
                </td>
                <td>
                    
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Item
                </td>
                <td>
                    Price
                </td>
            </tr>
            @foreach ($invoice->businessOrders as $order)
                <tr class="item">
                    <td>Order #{{ $order->id }}</td>
                    <td>${{ number_format($order->total_price, 2) }}</td>
                </tr>
            @endforeach
            <tr class="total">
                <td></td>
                <td>
                   Total: ${{ number_format($invoice->total_amount, 2) }}
                </td>
            </tr>
        </table>
    </div>
</body>
</html>

