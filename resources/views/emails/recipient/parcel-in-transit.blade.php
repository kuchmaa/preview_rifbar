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
            <h2 class="section-title">Your Order from {{ $businessName }} is on the Way!</h2>
            <p style="text-align: center;">Great news! Your package has been picked up and is now in transit to your address.</p>
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
            <h2 class="section-title">What's Being Delivered</h2>
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

    <!-- Фото подтверждения -->
    @if($pickupPhotoUrl)
    <tr>
        <td>
            <h2 class="section-title">Pickup Confirmation Photo</h2>
        </td>
    </tr>
    <tr>
        <td align="center" style="padding: 20px;">
            <img src="{{ $pickupPhotoUrl }}" alt="Pickup Photo" class="pickup-photo">
        </td>
    </tr>
    @endif

    <!-- Кнопка отслеживания -->
    <tr>
        <td align="center" style="padding: 20px;">
            <a href="{{ $trackingUrl }}" class="track-button">Track Your Order: {{ $trackingNumber }}</a>
        </td>
    </tr>

    <!-- Футер -->
    <tr>
        <td class="footer">
            <p>We'll notify you again when your package is delivered.<br>Thank you for using Duma Shipping!</p>
        </td>
    </tr>
</table>
