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
    .delivery-photo {
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
            <h2 class="section-title">Your parcel has been delivered</h2>
            <p style="text-align: center;">Dear {{ $order->name }},<br>Your parcel with track number {{ $order->track_number }} has been successfully delivered.</p>
        </td>
    </tr>

    <!-- Информация о доставке -->
    <tr>
        <td>
            <h2 class="section-title">Delivery Info</h2>
            <table class="info-table">
                <tr><td><strong>Track Number</strong></td><td>{{ $order->track_number }}</td></tr>
                <tr><td><strong>Pick-up Time</strong></td><td>{{ $order->getPickupTime() }}</td></tr>
                <tr><td><strong>Delivery Time</strong></td><td>{{ $order->getDeliveryTime() }}</td></tr>
            </table>
        </td>
    </tr>

    <!-- Фото -->
    @if(isset($deliveryPhotoPath) && $deliveryPhotoPath)
    <tr>
        <td>
            <h2 class="section-title">Delivery Confirmation Photo</h2>
        </td>
    </tr>
    <tr>
        <td align="center" style="padding: 20px;">
            <img src="{{ config('app.url') . '/storage/' . $deliveryPhotoPath }}" alt="Delivery Photo" class="delivery-photo">
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
