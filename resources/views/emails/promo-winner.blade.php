<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎉 You Won!</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .winner-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 24px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 20px;
        }
        .prize-section {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            margin: 30px 0;
        }
        .prize-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .prize-description {
            font-size: 16px;
            opacity: 0.9;
        }
        .details-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        .detail-label {
            font-weight: bold;
            color: #666;
        }
        .detail-value {
            color: #333;
        }
        .cta-section {
            text-align: center;
            margin: 30px 0;
        }
        .cta-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 40px;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            font-size: 16px;
            display: inline-block;
            transition: transform 0.2s;
        }
        .cta-button:hover {
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            color: #666;
            font-size: 14px;
        }
        .company-info {
            margin: 20px 0;
            text-align: center;
        }
        .company-logo {
            max-width: 150px;
            height: auto;
            margin-bottom: 10px;
        }
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            .container {
                padding: 20px;
            }
            .winner-badge {
                font-size: 20px;
                padding: 12px 25px;
            }
            .prize-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="winner-badge">
                🎉 WINNER! 🎉
            </div>
            <h1>Congratulations, {{ $winner->name ?? 'Winner' }}!</h1>
            <p style="font-size: 18px; color: #666;">
                You have won our amazing giveaway!
            </p>
        </div>

        @if($promoPage->company_logo || $promoPage->company_name)
        <div class="company-info">
            @if($promoPage->company_logo)
                <img src="{{ Storage::url($promoPage->company_logo) }}" alt="{{ $promoPage->company_name }}" class="company-logo">
            @endif
            @if($promoPage->company_name)
                <h3>{{ $promoPage->company_name }}</h3>
            @endif
        </div>
        @endif

        <div class="prize-section">
            <div class="prize-title">
                🏆 {{ $promoPage->prize_title ?? 'Amazing Prize' }}
            </div>
            @if($promoPage->prize_description)
            <div class="prize-description">
                {{ $promoPage->prize_description }}
            </div>
            @endif
        </div>

        <div class="details-section">
            <h3>🎯 Giveaway Details</h3>
            <div class="detail-row">
                <span class="detail-label">Giveaway:</span>
                <span class="detail-value">{{ $promoPage->title }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Winner Selected:</span>
                <span class="detail-value">{{ $promoPage->winner_selected_at ? $promoPage->winner_selected_at->format('F j, Y \a\t g:i A') : 'Today' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Your Email:</span>
                <span class="detail-value">{{ $winner->email }}</span>
            </div>
            @if($winner->phone)
            <div class="detail-row">
                <span class="detail-label">Your Phone:</span>
                <span class="detail-value">{{ $winner->phone }}</span>
            </div>
            @endif
        </div>

        <div style="background: #e3f2fd; padding: 20px; border-radius: 10px; margin: 20px 0;">
            <h3 style="color: #1976d2; margin-top: 0;">📋 What's Next?</h3>
            <p style="margin-bottom: 0;">
                Our team will contact you within 24-48 hours to arrange prize delivery. 
                Please keep this email as confirmation of your win. Make sure to check your phone 
                for calls from our team!
            </p>
        </div>

        <div class="cta-section">
            <a href="{{ route('promo.show', $promoPage->slug) }}" class="cta-button">
                🎊 View Giveaway Page
            </a>
        </div>

        @if($promoPage->terms_and_conditions)
        <div style="background: #fff3e0; padding: 15px; border-radius: 8px; margin: 20px 0;">
            <h4 style="color: #f57c00; margin-top: 0;">📜 Terms & Conditions</h4>
            <div style="font-size: 14px; color: #666;">
                {!! nl2br(e($promoPage->terms_and_conditions)) !!}
            </div>
        </div>
        @endif

        <div class="footer">
            <p><strong>Thank you for participating in our giveaway!</strong></p>
            <p>
                This email was sent because you were selected as the winner of our giveaway. 
                If you have any questions, please contact our support team.
            </p>
            <p style="margin-top: 20px;">
                <small>
                    © {{ date('Y') }} {{ $promoPage->company_name ?? config('app.name') }}. All rights reserved.
                </small>
            </p>
        </div>
    </div>
</body>
</html>
