@extends('layouts.app')

@section('meta_title', 'Thank you for your order!')
@section('meta_description', 'Your order has been successfully placed. View your order details or return to the homepage.')

@section('content')
<section class="wrapper flex-center" style="min-height: 70vh; margin: 20px 0;">
    <div class="section-content flex col aic" style="max-width: 540px; width: 100%; background: #fff; border-radius: 18px; box-shadow: 0 4px 32px rgba(0,0,0,0.1);">
        <div class="flex col aic section-text" style="gap: 28px; text-align: center;">
            <svg width="90" height="90" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="45" cy="45" r="45" fill="var(--blue)"/>
                <path d="M28 47L41 60L63 36" stroke="white" stroke-width="7" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <h1 class="h2 color-blue">Thank you for your order!</h1>
            <p class="size_md">Your order has been successfully placed.<br>We appreciate your trust in Duma Shipping.</p>
        </div>
        <div class="flex col aic" style="gap: 18px;">
            <a href="{{ route('orders.accessAfterThankYou', ['order' => $orderId]) }}" class="button color-white btn_blue">
                View Order Details
            </a>
            <a href="/" class="button btn_transparent underline">Back to Home</a>
        </div>
    </div>
</section>
<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>
@endsection 
