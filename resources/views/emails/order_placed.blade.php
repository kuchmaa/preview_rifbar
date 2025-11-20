<style>
    body, p, h1, h2, h3, td, th {
        font-family: Arial, sans-serif;
        color: #000000 !important;
    }
    .email-container {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        background-color: #ffffff;
        border-collapse: collapse;
    }
    .header {
        text-align: center;
        padding: 20px;
    }
    .header img {
        display: block;
        margin: 0 auto;
    }
    .section-title {
        font-size: 18px;
        margin-top: 20px;
        text-align: center;
        color: #304fff;
    }
    .info-table {
        width: 100%;
        border-collapse: collapse;
    }
    .info-table td {
        padding: 10px;
        border: 1px solid #ccc;
        font-size: 14px;
    }
    .cargo-table th {
        background-color: #f5f5f5;
        text-align: left;
    }
    .cargo-table td, .cargo-table th {
        padding: 10px;
        border: 1px solid #ccc;
        font-size: 14px;
    }
    .total {
        font-size: 18px;
        font-weight: bold;
    }
    .final-cost {
        font-size: 28px;
        color: #304fff;
        font-weight: bold;
    }
    .button {
        display: inline-block;
        color: #ffffff;
        padding: 10px 16px;
        text-decoration: none;
        border-radius: 30px;
    }
    .button-primary {
        background: #304fff;
    }
    .button-stripe {
        background: #6772e5;
        font-weight: bold;
        border-radius: 5px;
        padding: 12px 20px;
    }
</style>

<table class="email-container" cellpadding="0" cellspacing="0" align="center">
    <!-- Логотип -->
    <tr>
        <td class="header">
            <a href="{{ config('app.url') }}">
                <img src="{{ config('app.url') . '/imgs/logo-white.png' }}" width="200" alt="Duma shipping logo">
            </a>
        </td>
    </tr>

    <!-- Заголовок заказа -->
    <tr>
        <td>
            <h2 class="section-title">Order №{{ $order->id }}</h2>
            <table class="info-table">
                @if($order->business)
                    <tr>
                        <td><strong>Business Name</strong></td>
                        <td>{{ $order->business->name }}</td>
                    </tr>
                @endif
                <tr>
                    <td><strong>Track Number</strong></td>
                    <td>{{ $order->track_number }}</td>
                </tr>
                <tr>
                    <td><strong>Pick-up address</strong></td>
                    <td>{{ $order->up_address }}</td>
                </tr>
                <tr>
                    <td><strong>Delivery address</strong></td>
                    <td>{{ $order->deliver_address }}</td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- Информация о клиенте -->
    <tr>
        <td>
            <h2 class="section-title">Customer Info</h2>
            <table class="info-table">
                <tr>
                    <td><strong>Name</strong></td>
                    <td>{{ $order->name }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>{{ $order->email }}</td>
                </tr>
                <tr>
                    <td><strong>Phone</strong></td>
                    <td>{{ $order->phone }}</td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- Детали груза -->
    <tr>
        <td>
            <h2 class="section-title">Cargo Details</h2>
            <table class="cargo-table" style="width: 100%">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Subtype</th>
                        <th>Quantity</th>
                        <th>Cost per unit</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->subcategory }}</td>
                            <td>{{ $item->count }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>${{ number_format($item->getTotalPrice(), 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </td>
    </tr>

    <!-- QR-код и финансы -->
    <tr>
        <td>
            <table style="width: 100%;">
                <tr>
                    <!-- Левая колонка с QR -->
                    <td width="50%" valign="top" style="padding: 20px;">
                        @if(!empty($qrCode))
                            <img src="{{ route('orders.qr-img', $order->id) }}" width="170" alt="QR Code">
                            <div style="margin-top: 10px;">
                                <a href="{{ route('orders.downloadQrPdf', $order) }}"
                                   class="button button-primary">
                                    Download QR-code
                                </a>
                            </div>
                        @endif
                    </td>

                    <!-- Правая колонка с расчётами -->
                    <td width="50%" valign="top" style="padding: 20px; text-align: right;">
                        <p class="total">Total Cost: ${{ number_format($order->getItemsTotal(), 2) }}</p>
                        @if($order->payment_method === 'stripe' && $order->getStripeFee() > 0)
                        <p class="total">Stripe Fee (3%): ${{ number_format($order->getStripeFee(), 2) }}</p>
                        @endif
                        <p class="total">Insurance: ${{ number_format($order->insurance, 2) }}</p>
                        <p class="final-cost">Final Cost: ${{ number_format($order->total_price, 2) }}</p>
                        @if($paymentUrl)
                            <div style="margin-top: 20px;">
                                <a href="{{ $paymentUrl }}" class="button button-stripe">
                                    Pay Now with Stripe
                                </a>
                            </div>
                        @endif
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
