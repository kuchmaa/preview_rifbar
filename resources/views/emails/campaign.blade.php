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
        padding: 20px;
    }
    .content {
        padding: 20px 0;
    }
    .footer {
        text-align: center;
        padding: 20px 0;
        font-size: 12px;
        color: #999;
    }
    .unsubscribe-link {
        color: #999;
    }
</style>

<div class="email-container">
    <div class="content">
        {!! $content !!}
    </div>
    <div class="footer">
        <hr>
        <p>You receive this email as a subscriber. <a href="{{-- route('unsubscribe', ['email' => $user->email, 'token' => $unsubscribeToken]) --}}" class="unsubscribe-link">Unsubscribe</a></p>
    </div>
</div> 