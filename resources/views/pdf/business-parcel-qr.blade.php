<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Parcel QR Code</title>
    <style>
        @page { margin: 0.2cm; }
        body { font-family: DejaVu Sans, sans-serif; color: #333; font-size: 8pt; }
        .label-container {
            width: 100%;
            page-break-inside: avoid;
        }
        h2 {
            text-align: center;
            margin: 0 0 5px 0;
            font-size: 12pt;
            border-bottom: 1px solid #ccc;
            padding-bottom: 3px;
        }
        .details-table { width: 100%; border-collapse: collapse; }
        .details-table td { padding: 1.5px 0; vertical-align: top; }
        .details-table td:first-child { font-weight: bold; width: 40%; }
        .qr-code { text-align: center; margin-top: 5px; }
        .qr-code img { width: 60%; height: auto; max-width: 180px; }
        .section-separator {
            border-top: 1px dashed #ccc;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="label-container">
        <div style="text-align: center; margin-bottom: 5px;">
            <img src="{{ public_path('imgs/logo-white.png') }}" alt="Logo" style="width: 150px; height: auto;">
        </div>

        <h2>Parcel Information</h2>
        <table class="details-table">
            @if($order->external_order_id)
                <tr>
                    <td>Business External Order ID:</td>
                    <td>{{ $order->external_order_id }}</td>
                </tr>
            @endif
            <tr>
                <td>Parcel Track Number:</td>
                <td>{{ $parcel->track_number }}</td>
            </tr>
            @if($parcel->external_order_id)
                <tr>
                    <td>Parcel External Order ID:</td>
                    <td>{{ $parcel->external_order_id }}</td>
                </tr>
            @endif
        </table>

        <div class="section-separator"></div>

        <table class="details-table">
            <tr>
                <td>Recipient Name:</td>
                <td>{{ $parcel->recipient_name }}</td>
            </tr>
            <tr>
                <td>Delivery Address:</td>
                <td>{{ $parcel->delivery_address }}, {{ $parcel->delivery_zip_code }}</td>
            </tr>
            <tr>
                <td>Pickup Address:</td>
                <td>{{ $order->pickup_address }}, {{ $order->pickup_zip_code }}</td>
            </tr>
        </table>

        <div class="qr-code">
            <img src="data:image/png;base64,{{ $qrCode }}" alt="Parcel QR Code">
        </div>
    </div>
</body>
</html>
