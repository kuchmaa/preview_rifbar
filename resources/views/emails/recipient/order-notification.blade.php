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
    .header, .footer {
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
    .track-button {
        display: inline-block;
        padding: 12px 24px;
        background-color: #304fff;
        color: white !important;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        margin: 20px 0;
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

    <!-- Заголовок -->
    <tr>
        <td>
            <h2 class="section-title">Your Order from {{ $businessName }} is Processed!</h2>
            <p style="text-align: center;">Hello,<br>This is a confirmation that <strong>{{ $businessName }}</strong> has shipped an order to you using Duma Shipping.</p>
        </td>
    </tr>

    <!-- Информация о доставке -->
    <tr>
        <td>
            <h2 class="section-title">Delivery Information</h2>
            <table class="info-table">
                <tr><td><strong>Tracking Number</strong></td><td>{{ $trackingNumber }}</td></tr>
                <tr><td><strong>Delivery Address</strong></td><td>{{ $deliveryAddress }}</td></tr>
            </table>
        </td>
    </tr>

    <!-- Товары -->
    <tr>
        <td>
            <h2 class="section-title">What's Inside</h2>
            <table class="info-table">
                <tr>
                    <td><strong>Item Description</strong></td>
                    <td><strong>Quantity</strong></td>
                </tr>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->itemCategory->name }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
                @endforeach
            </table>
        </td>
    </tr>

    <!-- Кнопка отслеживания -->
    <tr>
        <td align="center" style="padding: 20px;">
            <a href="{{ $trackingUrl }}" class="track-button">Track Your Order: {{ $trackingNumber }}</a>
        </td>
    </tr>

    <!-- Футер -->
    <tr>
        <td class="footer">
            <p>Thank you for using Duma Shipping!</p>
        </td>
    </tr>
</table>
