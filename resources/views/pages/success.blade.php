@extends('layouts.app')

@section('content')
<section id="hero1" class="wrapper hero flex-center">
    <div class="flex hero-content col aic tai_c">
        <div class="success-icon-container" style="margin-bottom: 30px;">
            <svg class="success-checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" width="70" height="70">
                <circle class="success-checkmark-circle" cx="26" cy="26" r="25" fill="none"/>
                <path class="success-checkmark-check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
            </svg>
        </div>
        <h1 class="color-blue">Payment Successful!</h1>
        <p>Your order is being processed. You will receive a confirmation email shortly.</p>
    </div>
</section>

<section class="wrapper flex-center">
    <div class="section-content flex col">
        <div class="flex col aic">
            @if(isset($error))
            <div class="banner banner_blue flex row">
                <div class="span_svg">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M37 20C37 29.0563 29.9184 36.4587 20.9905 36.9716L21 37H3L7.6284 31.6595C4.7588 28.6158 3 24.5133 3 20C3 10.6112 10.6112 3 20 3C29.3888 3 37 10.6112 37 20ZM19 10V24H21V10H19ZM19 27L19 29H21V27H19Z" fill="#304fff" />
                    </svg>
                </div>
                <span>{{ $error }}</span>
            </div>
            @endif
            
            @if(isset($message))
            <div class="banner banner_light_orange flex row" style="margin-top: 20px; max-width: 800px;">
                <div class="span_svg">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M37 20C37 29.0563 29.9184 36.4587 20.9905 36.9716L21 37H3L7.6284 31.6595C4.7588 28.6158 3 24.5133 3 20C3 10.6112 10.6112 3 20 3C29.3888 3 37 10.6112 37 20ZM19 10V24H21V10H19ZM19 27L19 29H21V27H19Z" fill="#F59A17" />
                    </svg>
                </div>
                <span>{{ $message }}</span>
            </div>
            @endif
            
            
            <div class="section-child flex col" style="margin-top: 40px; max-width: 800px;">
                <div class="flex col section-text">
                    <h2 class="uppercase">Order Details</h2>
                    @if(isset($trackNumber))
                    <div class="flex row aic" style="margin-top: 20px;">
                        <h3 class="color-blue"><strong>Tracking Number:</strong></h3>
                        <p style="margin-left: 10px; font-size: 24px;"><strong>{{ $trackNumber }}</strong></p>
                    </div>
                    @endif
                </div>
                
                <div class="flex col" style="margin-top: 20px; border: 2px solid var(--light-orange); border-radius: 10px; padding: 30px; background-color: #fafafa;">
                    <div class="flex row between" style="margin-bottom: 20px;">
                        <div class="flex col" style="flex: 1;">
                            <h3>Sender</h3>
                            <p class="size_md">{{ $orderData['name'] }}</p>
                            <p class="size_md">{{ $orderData['upAddress'] }}</p>
                            <p class="size_md">{{ $orderData['up_city'] ?? $orderData['upCity'] }}, {{ $orderData['up_zip_code'] ?? $orderData['upZipCode'] }}</p>
                            <p class="size_md">{{ $orderData['phone'] }}</p>
                            <p class="size_md">{{ $orderData['email'] }}</p>
                        </div>
                        <div class="flex col" style="flex: 1;">
                            <h3>Recipient</h3>
                            <p class="size_md">{{ $orderData['deliverAddress'] }}</p>
                        </div>
                    </div>
                    
                    <div class="flex col" style="margin-top: 20px; border-top: 1px solid #eee; padding-top: 20px;">
                        <div class="flex col">
                            <h3>Total price:</h3>
                            <p class="size_lg">${{ number_format($orderData['totalAmount'], 2) }}</p>
                        </div>
                        
                        {{-- Закомментированный блок страховки --}}
                        {{-- <div class="flex col">
                            <h3>Insurance:</h3>
                            <p class="size_lg">${{ number_format($orderData['insurance'], 2) }}</p>
                        </div> --}}
                        
                        <div class="flex col">
                            <h3 style="font-weight: bold; color: var(--orange);">Total Amount:</h3>
                            <p class="size_lg" style="font-weight: bold; color: var(--orange); font-size: 24px;">${{ number_format($orderData['totalAmount'], 2) }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="flex row aic" style="margin-top: 40px; justify-content: center; gap: 20px;">
                    @if(isset($orderId))
                    <a href="{{ route('orders.show', $orderId) }}" class="btn_blue">
                        <span class="span_svg">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="white"/>
                            </svg>
                        </span>
                        <span>Order Details</span>
                    </a>
                    @endif
                    <a href="{{ route('home') }}" class="btn_transparent">
                        <span class="span_svg">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 20V14H14V20H19V12H22L12 3L2 12H5V20H10Z" fill="black"/>
                            </svg>
                        </span>
                        <span>Home</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@if(isset($orderData['boxes']) || isset($orderData['furniture']) || isset($orderData['mattresses']) || isset($orderData['tv']) || isset($orderData['doors']) || isset($orderData['suitcases']) || isset($orderData['van']))
<section class="wrapper flex-center" style="margin-top: 40px;">
    <div class="section-content flex col">
        <div class="flex col aic">
            <div class="section-child flex col" style="max-width: 800px;">
                <div class="flex col section-text">
                    <h2 class="uppercase">Shipment Information</h2>
                </div>
                
                <div class="flex col" style="margin-top: 20px; border: 2px solid var(--blue); border-radius: 10px; padding: 30px; background-color: #fafafa;">
                    @if(isset($orderData['boxes']) && count($orderData['boxes']) > 0)
                    <div class="flex col" style="margin-bottom: 20px;">
                        <h3 class="color-blue">Boxes</h3>
                        <div class="flex col" style="margin-top: 10px;">
                            @foreach($orderData['boxes'] as $box)
                            <div class="flex row between" style="margin-bottom: 5px;">
                                <p class="size_md">{{ ucfirst($box['key']) }} Box</p>
                                <p class="size_md">x{{ $box['count'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    @if(isset($orderData['furniture']) && count($orderData['furniture']) > 0)
                    <div class="flex col" style="margin-bottom: 20px;">
                        <h3 class="color-blue">Furniture</h3>
                        <div class="flex col" style="margin-top: 10px;">
                            @foreach($orderData['furniture'] as $item)
                            <div class="flex row between" style="margin-bottom: 5px;">
                                <p class="size_md">{{ $item['name'] ?? 'Furniture' }}</p>
                                <p class="size_md">x{{ $item['count'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    @if(isset($orderData['mattresses']) && count($orderData['mattresses']) > 0)
                    <div class="flex col" style="margin-bottom: 20px;">
                        <h3 class="color-blue">Mattresses</h3>
                        <div class="flex col" style="margin-top: 10px;">
                            @foreach($orderData['mattresses'] as $item)
                            <div class="flex row between" style="margin-bottom: 5px;">
                                <p class="size_md">
                                    @switch($item['key'])
                                        @case('kingHeavy')
                                            King Size (Heavy)
                                            @break
                                        @case('kingRegular')
                                            King Size (Regular)
                                            @break
                                        @case('queen_heavy')
                                            Queen Size (Heavy)
                                            @break
                                        @case('queen_regular')
                                            Queen Size (Regular)
                                            @break
                                        @case('twin_heavy')
                                            Twin Size (Heavy)
                                            @break
                                        @case('twin_regular')
                                            Twin Size (Regular)
                                            @break
                                        @default
                                            Mattress
                                    @endswitch
                                </p>
                                <p class="size_md">x{{ $item['count'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    @if(isset($orderData['doors']) && count($orderData['doors']) > 0)
                    <div class="flex col" style="margin-bottom: 20px;">
                        <h3 class="color-blue">Doors</h3>
                        <div class="flex col" style="margin-top: 10px;">
                            @foreach($orderData['doors'] as $item)
                            <div class="flex row between" style="margin-bottom: 5px;">
                                <p class="size_md">
                                    @if($item['key'] == 'interior_door')
                                        Interior Door
                                    @else
                                        Door
                                    @endif
                                </p>
                                <p class="size_md">x{{ $item['count'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    @if(isset($orderData['tv']) && count($orderData['tv']) > 0)
                    <div class="flex col" style="margin-bottom: 20px;">
                        <h3 class="color-blue">TVs</h3>
                        <div class="flex col" style="margin-top: 10px;">
                            @foreach($orderData['tv'] as $item)
                            <div class="flex row between" style="margin-bottom: 5px;">
                                <p class="size_md">
                                    @if($item['key'] == 'under64')
                                        TV (under 64")
                                    @elseif($item['key'] == 'over64')
                                        TV (over 64")
                                    @else
                                        TV
                                    @endif
                                </p>
                                <p class="size_md">x{{ $item['count'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    @if(isset($orderData['suitcases']) && count($orderData['suitcases']) > 0)
                    <div class="flex col" style="margin-bottom: 20px;">
                        <h3 class="color-blue">Suitcases</h3>
                        <div class="flex col" style="margin-top: 10px;">
                            @foreach($orderData['suitcases'] as $item)
                            <div class="flex row between" style="margin-bottom: 5px;">
                                <p class="size_md">
                                    @if($item['key'] == 'small')
                                        Small Suitcase
                                    @elseif($item['key'] == 'large')
                                        Large Suitcase
                                    @else
                                        Suitcase
                                    @endif
                                </p>
                                <p class="size_md">x{{ $item['count'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    @if(isset($orderData['van']) && count($orderData['van']) > 0)
                    <div class="flex col" style="margin-bottom: 20px;">
                        <h3 class="color-blue">Van</h3>
                        <div class="flex col" style="margin-top: 10px;">
                            @foreach($orderData['van'] as $item)
                            <div class="flex row between" style="margin-bottom: 5px;">
                                <p class="size_md">
                                    @if($item['key'] == 'full')
                                        Full Van
                                    @elseif($item['key'] == 'half')
                                        Half Van
                                    @else
                                        Van
                                    @endif
                                </p>
                                <p class="size_md">x{{ $item['count'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    @if(!(isset($orderData['boxes']) && count($orderData['boxes']) > 0) && 
                        !(isset($orderData['furniture']) && count($orderData['furniture']) > 0) &&
                        !(isset($orderData['mattresses']) && count($orderData['mattresses']) > 0) &&
                        !(isset($orderData['doors']) && count($orderData['doors']) > 0) &&
                        !(isset($orderData['tv']) && count($orderData['tv']) > 0) &&
                        !(isset($orderData['suitcases']) && count($orderData['suitcases']) > 0) &&
                        !(isset($orderData['van']) && count($orderData['van']) > 0))
                    <div class="flex col">
                        <h3 class="color-blue">Your Shipment</h3>
                        <p class="size_md" style="margin-top: 15px;">Shipment details will be available once payment is fully processed.</p>
                        <div class="flex row aic" style="margin-top: 15px;">
                            <div class="loading-indicator"></div>
                            <p class="size_md" style="margin-left: 15px;">Processing your order...</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@else
<section class="wrapper flex-center" style="margin-top: 40px;">
    <div class="section-content flex col">
        <div class="flex col aic">
            <div class="section-child flex col" style="max-width: 800px;">
                <div class="flex col section-text">
                    <h2 class="uppercase">Shipment Information</h2>
                </div>
                
                <div class="flex col" style="margin-top: 20px; border: 2px solid var(--blue); border-radius: 10px; padding: 30px; background-color: #fafafa;">
                    <div class="flex col">
                        <h3 class="color-blue">Your Shipment</h3>
                        <p class="size_md" style="margin-top: 15px;">Shipment details will be available once payment is fully processed.</p>
                        <div class="flex row aic" style="margin-top: 15px;">
                            <div class="loading-indicator"></div>
                            <p class="size_md" style="margin-left: 15px;">Processing your order...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section class="wrapper flex-center" style="margin-top: 40px; margin-bottom: 60px;">
    <div class="section-content flex col">
        <div class="flex col aic">
            <div class="section-child flex col" style="max-width: 800px;">
                <div class="flex col section-text">
                    <h2 class="uppercase">What's Next?</h2>
                </div>
                
                <div class="flex col" style="margin-top: 20px; border: 2px solid var(--blue); border-radius: 10px; padding: 30px; background-color: #fafafa;">
                    <div class="steps-container">
                        <div class="step-item flex row">
                            <div class="step-number flex-center">1</div>
                            <div class="step-content">
                                <h3>Order Confirmation</h3>
                                <p class="size_md">You will receive an order confirmation email. Please save it for future reference.</p>
                            </div>
                        </div>
                        
                        <div class="step-item flex row">
                            <div class="step-number flex-center">2</div>
                            <div class="step-content">
                                <h3>Shipping Preparation</h3>
                                <p class="size_md">Our team will begin preparing your shipment. We'll contact you to confirm details if necessary.</p>
                            </div>
                        </div>
                        
                        <div class="step-item flex row">
                            <div class="step-number flex-center">3</div>
                            <div class="step-content">
                                <h3>Tracking</h3>
                                <p class="size_md">You can track your order status using the tracking number in your account dashboard or on our homepage.</p>
                            </div>
                        </div>
                        
                        <div class="step-item flex row">
                            <div class="step-number flex-center">4</div>
                            <div class="step-content">
                                <h3>Delivery</h3>
                                <p class="size_md">We'll contact you before delivery to confirm the time and date. Our team will ensure the safe transport of your shipment.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex col aic" style="margin-top: 30px; width: 100%;">
                        <a href="{{ route('home') }}" class="btn_blue" style="margin: 0 auto;">
                            <span>Place Another Order</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .success-icon-container {
        position: relative;
        width: 70px;
        height: 70px;
    }
    
    .success-checkmark {
        width: 70px;
        height: 70px;
        margin: 0 auto;
    }
    
    .success-checkmark-circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: var(--light-orange);
        fill: none;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }
    
    .success-checkmark-check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        stroke-width: 3;
        stroke: var(--light-orange);
        animation: stroke 0.4s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
    }
    
    @keyframes stroke {
        100% {
            stroke-dashoffset: 0;
        }
    }
    
    .loading-indicator {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(48, 79, 255, 0.3);
        border-radius: 50%;
        border-top-color: var(--blue);
        animation: spin 1s ease-in-out infinite;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    
    .hero-content {
        animation: fadeInDown 1s ease forwards;
    }
    
    .section-child {
        opacity: 0;
        animation: fadeIn 1s ease forwards;
        animation-delay: 0.5s;
    }
    
    .flex-center .section-content {
        opacity: 0;
        animation: fadeIn 1s ease forwards;
        animation-delay: 0.8s;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .section-child .flex-col {
        transition: all 0.3s ease;
    }
    
    .flex-row.between:hover {
        background-color: rgba(239, 121, 26, 0.05);
        border-radius: 5px;
        padding-left: 5px;
        padding-right: 5px;
    }
    
    .steps-container {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }
    
    .step-item {
        display: flex;
        align-items: flex-start;
        gap: 20px;
    }
    
    .step-number {
        min-width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--blue);
        color: white;
        font-weight: bold;
        font-size: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .step-content {
        flex: 1;
    }
    
    .step-content h3 {
        margin-bottom: 5px;
        color: var(--blue);
    }
    
    .step-item:hover .step-number {
        background-color: var(--orange);
        transform: scale(1.1);
        transition: all 0.3s ease;
    }
    
    .btn_blue {
        display: flex;
        align-items: center;
        padding: 10px 20px;
    }
</style>
@endpush

@section('scripts')
<script>
    // Очищаем сохраненные данные калькулятора после успешного заказа
    document.addEventListener('DOMContentLoaded', function() {
        // Проверяем, разрешены ли функциональные куки
        const cookieConsent = localStorage.getItem('cookieConsent');
        let functionalCookiesAllowed = true;
        
        if (cookieConsent) {
            const consentData = JSON.parse(cookieConsent);
            functionalCookiesAllowed = consentData.functional;
        }
        
        // Если функциональные куки разрешены, удаляем данные калькулятора
        if (functionalCookiesAllowed) {
            if (window.clearCalculatorData) {
                window.clearCalculatorData();
            } else {
                // Если функция clearCalculatorData еще не доступна, пробуем использовать cookieUtils напрямую
                if (window.cookieUtils) {
                    window.cookieUtils.deleteCookie('calculatorFormData');
                } else {
                    // Последний вариант - удаляем куки напрямую
                    document.cookie = "calculatorFormData=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;";
                }
                
                // Удаляем данные из localStorage
                localStorage.removeItem('calculatorFormData');
            }
        }
    });
</script>
@endsection 