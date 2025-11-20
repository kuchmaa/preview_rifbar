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
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .header {
        text-align: center;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    .header img {
        display: block;
        margin: 0 auto;
    }
    .content {
        padding: 20px 0;
    }
    .content h1 {
        color: #333;
    }
    .credentials {
        background-color: #f5f5f5;
        padding: 15px;
        border-radius: 5px;
        margin: 20px 0;
    }
    .credentials p {
        margin: 5px 0;
    }
    .credentials strong {
        display: inline-block;
        width: 80px;
    }
    .footer {
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid #eee;
        font-size: 12px;
        color: #999;
    }
    .login-button {
        display: inline-block;
        background-color: #304fff;
        color: #ffffff;
        padding: 12px 25px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        margin-top: 20px;
    }
</style>

<div class="email-container">
    <div class="header">
        <a href="{{ config('app.url') }}">
            <img src="{{ config('app.url') . '/imgs/logo-white.png' }}" width="200" alt="Duma Shipping Logo">
        </a>
    </div>

    <div class="content">
        <h1>Welcome to Duma Shipping!</h1>
        <p>Hello, {{ $user->name }}!</p>
        <p>A business account has been created for you. You can now log in to your business cabinet using the following credentials:</p>

        <div class="credentials">
            <p><strong>Login:</strong> {{ $user->email }}</p>
            <p><strong>Password:</strong> {{ $password }}</p>
        </div>

        <p>We highly recommend changing this password after your first login.</p>

        <a href="{{ route('login') }}" class="login-button">Go to Login Page</a>
    </div>

    <div class="footer">
        <p>Thank you for partnering with us!</p>
        <p>&copy; {{ date('Y') }} Duma Shipping. All rights reserved.</p>
    </div>
</div> 