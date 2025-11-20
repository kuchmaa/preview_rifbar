<x-mail::message>
# Payment Confirmed

Hello {{ $order->business->name }},

This is to confirm that we have successfully received your payment for **Order #{{ $order->id }}**.

**Order Summary:**
- **Total Amount:** ${{ number_format($order->total_price, 2) }}
- **Payment Method:** {{ $order->payment_method->label() }}
- **Confirmation Date:** {{ $order->payment_confirmed_at->format('Y-m-d H:i') }}

Thank you for your business.

Thanks,<br>
Duma Shipping
</x-mail::message> 