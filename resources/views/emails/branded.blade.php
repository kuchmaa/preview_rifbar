<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $emailSubject }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .email-header {
            background-color: #004085; /* Duma Shipping Brand Color */
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 30px;
            line-height: 1.6;
            color: #333333;
        }
        .email-body p {
            margin: 0 0 15px;
        }
        .email-footer {
            background-color: #f8f9fa;
            color: #6c757d;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            border-top: 1px solid #dddddd;
        }
        .email-footer a {
            color: #004085;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="{{ asset('imgs/logo-black.png') }}" alt="Duma Shipping Logo" width="150" style="pointer-events: none;">
        </div>
        <div class="email-body">
            {!! $body !!}
        </div>
        <div class="email-footer">
            <p>&copy; {{ date('Y') }} Duma Shipping. All rights reserved.</p>
            <p>
                <a href="{{ url('/') }}">Visit our website</a>
            </p>
        </div>
    </div>
</body>
</html>
