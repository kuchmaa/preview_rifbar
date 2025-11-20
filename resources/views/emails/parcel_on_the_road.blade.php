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
    .pickup-photo {
        max-width: 300px;
        height: auto;
        border: 1px solid #ddd;
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
            <h2 class="section-title">Your order №{{ $order->track_number }} is on the way</h2>
        </td>
    </tr>

    <!-- Информация о доставке -->
    <tr>
        <td>
            <h2 class="section-title">Schedule</h2>
            <table class="info-table">
                <tr><td><strong>Pick-up</strong></td><td>{{ $order->getPickupTime() }}</td></tr>
                <tr><td><strong>Delivery</strong></td><td>{{ $order->getDeliveryTime() }}</td></tr>
            </table>
        </td>
    </tr>

    <!-- Адреса -->
    <tr>
        <td>
            <h2 class="section-title">Addresses</h2>
            <table class="info-table">
                <tr><td><strong>Pick-up address</strong></td><td>{{ $order->up_address }}</td></tr>
                <tr><td><strong>Delivery address</strong></td><td>{{ $order->deliver_address }}</td></tr>
            </table>
        </td>
    </tr>

    <!-- Фото -->
    @if(isset($pickupPhotoPath) && $pickupPhotoPath)
    <tr>
        <td>
            <h2 class="section-title">Pickup Confirmation Photo</h2>
        </td>
    </tr>
    <tr>
        <td align="center" style="padding: 20px;">
            <img src="{{ config('app.url') . '/storage/' . $pickupPhotoPath }}" alt="Pickup Photo" class="pickup-photo">
        </td>
    </tr>
    @endif

    <!-- Футер -->
    <tr>
        <td class="footer">
            <p>Thank you for choosing Duma Shipping!</p>
        </td>
    </tr>
</table>
