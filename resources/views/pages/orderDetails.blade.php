@extends('layouts.app')

@section('meta_title', 'Order details')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/cabinet.css') }}">
<style>
    #ordersSetionWrapper {
        max-width: none; /* Override default wrapper constraints */
        padding-left: 0;
        padding-right: 0;
    }
    #ordersSetionWrapper > .section-remove-db_lr {
        max-width: 1200px; /* Or your preferred content width */
        margin-left: auto;
        margin-right: auto;
        padding-left: 15px;
        padding-right: 15px;
    }
</style>
@if(!empty($mapData['mapboxApiKey']))
<link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
<style>
    #map-container {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        margin-top: 20px;
        border: 1px solid #dee2e6;
    }
    #map {
        height: 400px;
        width: 100%;
        border-radius: 8px;
    }
    .mapboxgl-popup-content {
        font-family: 'Source Sans Pro', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
        padding: 10px;
    }
</style>
@endif
@endpush

@section('content')

<script async>
    // Пример смены логотипа и перекрашивания иконок в шапке (если нужно)
    const logo = document.querySelector(".logo");
    if (logo) {
        logo.src = "/svg/logo-black.svg";
    }

    const header = document.querySelector("header");
    if (header) {
        header.querySelectorAll("a").forEach((item) => {
            item.innerHTML = item.innerHTML.replace(/fill="black"/g, 'fill="var(--light-orange)"');
        });
    }
</script>
<section id="ordersSetionWrapper" class="wrapper section-content bg-blue">
    <div class="flex-center col section-remove-db_lr">
        {{-- Заголовок + Имя пользователя (из $order->name) --}}
        <div class="flex col aic color-white">
            <h1>Order Details</h1>
            <p>{{ $order->name }}</p>
        </div>

        <div id="orderDitails" open class="flex col">
            {{-- Кнопка «вернуться к списку заказов» --}}
            <div>
                <a href="{{ url('/orders') }}" class="button transparent_btn">
                    <svg width="28" height="28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 22L10 14L15 6L17 6L12 14L17 22H15Z" />
                    </svg>
                    <span><strong class="uppercase">YOUR ORDERS</strong></span>
                </a>
            </div>

            {{-- Блок с основной информацией о заказе --}}
            <div id="order-info" class="flex row aie">
                {{-- Секция: Номер заказа, статус, трек-номер --}}
                <div class="order-item flex col">
                    <h2 class="uppercase" id="id">Order #{{ $order->id }}</h2>
                    <div class="flex col">
                        {{-- Отображаем статус заказа через enum --}}
                        <div class="order-info-value flex row aic">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect width="60" height="60" rx="30" fill="#304FFF"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M18.8567 24.2143L18.5231 25.5004L27.0186 25.5026L26.6989 26.7883L18.1897 26.7861L17.3568 29.9974H23.1825L22.8628 31.2831H17.0233L15.8555 35.7857L21.3872 35.7857C21.3855 36.6771 21.6966 37.4357 22.3206 38.0614C22.9446 38.6871 23.6991 39 24.584 39C25.4705 39.0009 26.225 38.688 26.8473 38.0614C27.4696 37.4349 27.7807 36.6762 27.7807 35.7857H33.8802C33.881 36.678 34.1922 37.4366 34.8137 38.0614C35.4351 38.6863 36.1891 38.9991 37.0757 39C37.9623 39.0009 38.7167 38.688 39.339 38.0614C39.9613 37.4349 40.2725 36.6762 40.2725 35.7857H41.7481L42.8555 30.1491L39.3876 25.5H36.7292L37.7649 21L23.0832 21L22.2496 24.2143H18.8567ZM22.6659 35.7857C22.6659 36.3146 22.8539 36.7684 23.2298 37.1473C23.6066 37.5253 24.058 37.7143 24.584 37.7143C25.1099 37.7143 25.5613 37.5253 25.9381 37.1473C26.3141 36.7684 26.502 36.3146 26.502 35.7857C26.502 35.2569 26.3141 34.803 25.9381 34.4241C25.5622 34.0453 25.1108 33.8563 24.584 33.8571C24.0571 33.858 23.6057 34.047 23.2298 34.4241C22.8539 34.803 22.6659 35.2569 22.6659 35.7857ZM35.3085 31.6071H41.2558L41.4821 30.4629L38.7482 26.7857H36.4235L35.3085 31.6071ZM37.077 37.7143C37.6029 37.7143 38.0539 37.5253 38.4298 37.1473C38.8058 36.7684 38.9938 36.3146 38.9938 35.7857C38.9938 35.2569 38.8058 34.803 38.4298 34.4241C38.0539 34.0453 37.6025 33.8563 37.0757 33.8571C36.5489 33.858 36.0979 34.047 35.7228 34.4241C35.346 34.803 35.1576 35.2569 35.1576 35.7857C35.1576 36.3146 35.3456 36.7684 35.7215 37.1473C36.0983 37.5253 36.5501 37.7143 37.077 37.7143Z"
                                      fill="white"/>
                            </svg>
                            <div class="flex col">
                                <span><strong>Status</strong></span>
                                <span id="orderStatus">{{ $order->status->value ?? 'Created' }}</span>
                            </div>
                        </div>

                        {{-- Трек-номер --}}
                        <div class="order-info-value flex row aic">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect x="1" y="1" width="58" height="58" rx="29"
                                      stroke="#304FFF" stroke-width="2"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M40 24.4545C40 30.2284 30 44 30 44C30 44 20 30.2284 20 24.4545C20 18.6807 24.4772 14 30 14C35.5228 14 40 18.6807 40 24.4545ZM30 31C33.866 31 37 27.866 37 24C37 20.134 33.866 17 30 17C26.134 17 23 20.134 23 24C23 27.866 26.134 31 30 31ZM31 23V19H29V25H33V23H31Z"
                                      fill="#304FFF"/>
                            </svg>
                            <div class="flex col">
                                <span><strong>Track Number</strong></span>
                                <span id="trackNumber">{{ $order->track_number }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Адреса отправления и доставки --}}
                <div class="order-item flex col">
                    <h3 class="order-sh">Addresses</h3>
                    <div class='order-info-value flex row ais'>
                        <svg width="29" height="28" viewBox="0 0 29 28" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M14.668 23C14.668 23 20.668 14.7371 20.668 11.2727C20.668 7.8084 17.9817 5 14.668 5C11.3543 5 8.66797 7.8084 8.66797 11.2727C8.66797 14.7371 14.668 23 14.668 23ZM14.668 13.7273C15.8926 13.7273 16.8854 12.6894 16.8854 11.4091C16.8854 10.1288 15.8926 9.09091 14.668 9.09091C13.4433 9.09091 12.4506 10.1288 12.4506 11.4091C12.4506 12.6894 13.4433 13.7273 14.668 13.7273Z"
                                  fill="black"/>
                        </svg>
                        <span><strong>Pick up address</strong></span>
                        <span id="pickUp">{{ $order->up_address }}</span>
                    </div>
                    <div class='order-info-value flex row ais'>
                        <svg width="29" height="28" viewBox="0 0 29 28" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M14.668 23C14.668 23 20.668 14.7371 20.668 11.2727C20.668 7.8084 17.9817 5 14.668 5C11.3543 5 8.66797 7.8084 8.66797 11.2727C8.66797 14.7371 14.668 23 14.668 23ZM14.668 13.7273C15.8926 13.7273 16.8854 12.6894 16.8854 11.4091C16.8854 10.1288 15.8926 9.09091 14.668 9.09091C13.4433 9.09091 12.4506 10.1288 12.4506 11.4091C12.4506 12.6894 13.4433 13.7273 14.668 13.7273Z"
                                  fill="black"/>
                        </svg>
                        <span><strong>Delivery address</strong></span>
                        <span id="delivery">{{ $order->deliver_address }}</span>
                    </div>
                </div>

                {{-- Данные клиента (имя, email, телефон) --}}
                <div class="order-item flex col aie">
                    <h3 class="order-sh">Customer Info</h3>
                    <div class='order-info-value flex row aic'>
                        <div class="flex row aic">
                            <span>
                                <strong id="customerName">{{ $order->name }}</strong>
                            </span>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M14.5 12C16.433 12 18 10.433 18 8.5C18 6.567 16.433 5 14.5 5C12.567 5 11 6.567 11 8.5C11 10.433 12.567 12 14.5 12ZM14 18C10.829 18 8.15043 20.1085 7.28988 23H20.7101C19.8496 20.1085 17.171 18 14 18ZM22.777 23C21.8675 18.992 18.2832 16 14 16C9.71683 16 6.13247 18.992 5.22302 23C5.07706 23.6432 5 24.3126 5 25H23C23 24.3126 22.9229 23.6432 22.777 23ZM14.5 14C17.5376 14 20 11.5376 20 8.5C20 5.46243 17.5376 3 14.5 3C11.4624 3 9 5.46243 9 8.5C9 11.5376 11.4624 14 14.5 14Z"
                                      fill="#304FFF"/>
                            </svg>
                        </div>
                    </div>
                    <div class='order-info-value flex row aic'>
                        <div class="flex row aic">
                            <span id="customerEmail">{{ $order->email }}</span>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 6H4V22H24V6ZM22 10L14 15L6 10V8L14 13L22 8V10Z" fill="black"/>
                            </svg>
                        </div>
                    </div>
                    <div class='order-info-value flex row aic'>
                        <div class="flex row aic">
                            <span class='size_xl'>
                                <strong id="customerPhone">{{ $order->phone }}</strong>
                            </span>
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M24.0001 21.92V18.92C24.0123 18.4296 24 18 24 18L18 16C18 16 17.632 16.3712 17.3601 16.64L16.0901 17.91C13.5866 16.4865 11.5137 14.4136 10.0901 11.91L11.3601 10.64C11.629 10.3681 12 9.99996 12 9.99996L10 3.99996C10 3.99996 9.59542 3.99524 9.11012 4.00002H6.11012H4L4.12012 6.18002C4.44836 9.27101 5.5001 12.2412 7.19012 14.85C8.72545 17.2662 10.7739 19.3147 13.1901 20.85C15.7871 22.5342 18.743 23.5857 21.8201 23.92L24 24L24.0001 21.92Z"
                                      fill="black"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Real-time Map Section --}}
            @if(!empty($mapData['mapboxApiKey']))
                <div id="map-container">
                    <h3><strong>Live Order Tracking</strong></h3>
                    <x-order-map 
                        :order="$order"
                        :mapboxApiKey="$mapData['mapboxApiKey']"
                        height="500px"
                        :showDriverLocation="true"
                        :showRoute="true"
                        :showUserLocation="false"
                    />
                </div>
            @endif

            {{-- Display Driver Photos --}}
            @if($order->photos->isNotEmpty())
                <div id="order-driver-photos" class="flex col">
                    <h3><strong>Driver Uploaded Photos</strong></h3>
                    <div class="flex row warp">
                        @php
                            $pickupPhoto = $order->photos->firstWhere('type', 'pickup');
                            $deliveryPhoto = $order->photos->firstWhere('type', 'delivery');
                        @endphp
                        @if($pickupPhoto)
                            <div class="flex col">
                                <span>Pickup Photo</span>
                                <img src="{{ asset('storage/' . $pickupPhoto->photo_path) }}" alt="Pickup Photo" style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
                            </div>
                        @endif
                        @if($deliveryPhoto)
                            <div class="flex col">
                                <span>Delivery Photo</span>
                                <img src="{{ asset('storage/' . $deliveryPhoto->photo_path) }}" alt="Delivery Photo" style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; border-radius: 4px; padding: 5px;">
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            {{-- Feedback Section --}}
            <div id="order-feedback-section" class="flex col ais">
                <h3><strong>Feedback</strong></h3>
                @if ($order->status->value !== \App\Enums\OrderStatus::Delivered->value)
                    <p>Feedback can be submitted once the order is delivered.</p>
                @else
                    @if ($order->rating !== null || $order->comment !== null)
                        <div id="feedback-details">
                            <p class="flex row aic" style="gap: 3px;">
                                <strong style="margin-right: 5px">Rating:</strong>
                                @for ($i = 0; $i < $order->rating; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" active height="24px" class="star-icon" viewBox="0 -960 960 960" width="24px"><path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/></svg>
                                @endfor
                            </p>
                            <p class="flex col"><span><strong>Comment:</strong></span> {{ $order->comment ?: 'N/A' }}</p>
                        </div>
                    @else
                        @guest
                            <p><a href="{{ route('login') }}">Log in</a> to leave feedback.</p>
                        @else
                            @if (Auth::id() === $order->user_id)
                                <p>We would love to hear your feedback on this delivery!</p>
                                @include('components._feedback_form', ['order' => $order])
                            @else
                                <p>Feedback can only be submitted by the order creator.</p>
                            @endif
                        @endguest
                    @endif
                @endif
            </div>
            {{-- End Feedback Section --}}

            {{-- Таблица с заказанными позициями (items) --}}
            <div id="order-table-wrapper" class="flex col">
                <h3><strong>Ordered options</strong></h3>
                <div class="tableWrapper">
                    <table>
                        <thead>
                            <tr>
                                <td scope="col" class="border-right">
                                    <div class='t-svg'>
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M29.5788 14.1584H30.2998H33V17.3162H31.9212L30.4212 23.6317H28.774H25.4616H18V20.4739H28.0788L29.5788 14.1584Z" fill="black" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.42116 14.1584H5.70018H3V17.3162H4.07884L5.57884 23.6317H7.22599H10.5384H18V20.4739H7.92116L6.42116 14.1584Z" fill="black" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M30.75 12.5788L30.5248 13.369H28.9933L27.4933 19.6845H8.50675L7.00675 13.369H5.4752L5.25 12.5788L7.125 11L28.875 11L30.75 12.5788ZM29.1827 24.4211H25.9744L27 26H30L29.1827 24.4211ZM10.0256 24.4211H6.81732L6 26H9L10.0256 24.4211Z" fill="black" />
                                        </svg>
                                        <span><strong>Category</strong></span>
                                    </div>
                                </td>
                                <td scope="col" class="border-right">
                                    <div class='t-svg'>
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M30.5714 15.9515L34 22.9757L30.5714 30H28.2857L31.7143 22.9757L28.2857 15.9515H30.5714Z" fill="black" />
                                            <path d="M31.714 24.1464L22.5714 24.1464L22.5717 21.8051L31.7143 21.805L31.714 24.1464Z" fill="black" />
                                            <path d="M15.0286 26.4859L2 26.4863L2.00042 12.4224L15.029 12.4219L15.0286 26.4859Z" fill="black" />
                                            <path d="M16.7657 10.8756L3.73714 10.8761L9.54286 6.00044L22.5714 6L16.7657 10.8756Z" fill="black" />
                                            <path d="M16.7657 24.6323V10.8756L22.5714 6V18.2929L16.7657 24.6323Z" fill="black" />
                                        </svg>
                                        <span><strong>Subtype</strong></span>
                                    </div>
                                </td>
                                <th scope="col" class="border-right">
                                    <div class='t-svg'>
                                        <svg width="37" height="36" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.9 31.9983L8.5 31.9987L8.50037 19.9855L19.9004 19.9851L19.9 31.9983Z" fill="black" />
                                            <path d="M21.42 18.6643L10.02 18.6647L15.1 14.5L26.5 14.4996L21.42 18.6643Z" fill="black" />
                                            <path d="M21.42 30.415V18.6643L26.5 14.4996V25L21.42 30.415Z" fill="black" />
                                            <path d="M22 17.0002L14.5 17.0005L14.5002 9.41291L22.0002 9.41267L22 17.0002Z" fill="black" />
                                            <path d="M23 8.57843L15.5 8.57867L19.5 5.00024L27 5L23 8.57843Z" fill="black" />
                                            <path d="M23 16.0002V8.50024L27 5V12.4218L23 16.0002Z" fill="black" />
                                            <path d="M25.9399 18.3855L21.1399 18.3857L23.6999 16.0002L28.4999 16L25.9399 18.3855Z" fill="black" />
                                            <path d="M25.9399 23.3332V18.3334L28.4999 16V20.9477L25.9399 23.3332Z" fill="black" />
                                        </svg>
                                        <span><strong>Quantity</strong></span>
                                    </div>
                                </th>
                                <th scope="col" class="border-right">
                                    <div class='t-svg'>
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.0558 13.4042L20.3479 12.6526C19.4146 11.6615 18.6422 11.3276 18.0233 11.3276C17.6257 11.3276 17.3922 11.4329 17.2338 11.5724L17.2324 11.5736C17.0477 11.7356 17.0233 11.848 17.0233 11.9429C17.0233 11.9783 17.0338 12.1047 17.2482 12.3362L17.2561 12.3447L17.2638 12.3534C17.4214 12.5317 17.8806 12.8462 18.8437 13.2511L18.8489 13.2533C20.5846 13.9947 21.8859 14.6715 22.6443 15.2911C23.3969 15.906 23.9825 16.6514 24.3906 17.5213C24.8034 18.4012 24.9999 19.3685 24.9999 20.4051C24.9999 21.4521 24.7876 22.4396 24.3535 23.3536C23.9314 24.2422 23.3687 24.9848 22.65 25.5453C22.0828 25.9877 21.3686 26.3174 20.5438 26.5598V30H17V29H19.5438V25.7814C20.6276 25.5484 21.458 25.2068 22.035 24.7568C22.612 24.3068 23.0837 23.696 23.4502 22.9245C23.8167 22.153 23.9999 21.3132 23.9999 20.4051C23.9999 19.497 23.8284 18.6773 23.4853 17.946C23.1422 17.2147 22.651 16.5879 22.0116 16.0655C21.3722 15.5432 20.1871 14.9123 18.4561 14.173C17.4814 13.7631 16.8342 13.3774 16.5145 13.0157C16.1871 12.6621 16.0233 12.3045 16.0233 11.9429C16.0233 11.5169 16.2066 11.1433 16.573 10.8218C16.9473 10.4923 17.4307 10.3276 18.0233 10.3276C18.9017 10.3276 19.7891 10.7443 20.6853 11.5779C20.8153 11.6988 20.9455 11.8285 21.0759 11.967L23.3333 9.70073C23.1428 9.50233 22.959 9.31922 22.7818 9.1514C22.727 9.09959 22.6729 9.04923 22.6195 9.00033C22.1938 8.611 21.8079 8.31407 21.4619 8.10954C20.9395 7.79612 20.3001 7.547 19.5438 7.36216V6H17V5H20.5438V6.60855C21.067 6.78172 21.5457 6.99398 21.9736 7.25038C22.6164 7.6309 23.3121 8.23458 24.0547 9.00827L24.7318 9.71369L21.0558 13.4042Z" fill="black" />
                                            <path d="M22.3333 10.7007L20.076 12.967C19.0468 11.874 18.0292 11.3276 17.0234 11.3276C16.4308 11.3276 15.9474 11.4923 15.5731 11.8218C15.2066 12.1433 15.0234 12.5169 15.0234 12.9429C15.0234 13.3045 15.1871 13.6621 15.5146 14.0157C15.8343 14.3774 16.4815 14.7631 17.4561 15.173C19.1871 15.9123 20.3723 16.5432 21.0117 17.0655C21.6511 17.5879 22.1423 18.2147 22.4854 18.946C22.8285 19.6773 23 20.497 23 21.4051C23 22.3132 22.8168 23.153 22.4503 23.9245C22.0838 24.696 21.6121 25.3068 21.0351 25.7568C20.4581 26.2068 19.6277 26.5484 18.5439 26.7814V30H16.345V26.8538C15.3236 26.7332 14.4542 26.468 13.7368 26.0582C12.7544 25.4956 11.8421 24.7483 11 23.816L13.2222 21.4654C14.6491 23.0325 16.0292 23.816 17.3626 23.816C18.0409 23.816 18.6218 23.5749 19.1053 23.0928C19.5965 22.6026 19.8421 22.028 19.8421 21.369C19.8421 20.8145 19.6862 20.3283 19.3743 19.9104C19.0546 19.4925 18.4386 19.0666 17.5263 18.6326C15.6706 17.7486 14.4152 17.0494 13.7602 16.5351C13.1053 16.0128 12.614 15.4301 12.2865 14.7872C11.9669 14.1363 11.807 13.4451 11.807 12.7138C11.807 11.5003 12.2359 10.4637 13.0936 9.60377C13.9513 8.73585 15.0351 8.26974 16.345 8.20545V7H18.5439V8.36216C19.3002 8.547 19.9396 8.79612 20.462 9.10954C20.9922 9.42296 21.616 9.95335 22.3333 10.7007Z" fill="black" />
                                        </svg>
                                        <span><strong>Cost per unit</strong></span>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class='t-svg'>
                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.0558 13.4042L20.3479 12.6526C19.4146 11.6615 18.6422 11.3276 18.0233 11.3276C17.6257 11.3276 17.3922 11.4329 17.2338 11.5724L17.2324 11.5736C17.0477 11.7356 17.0233 11.848 17.0233 11.9429C17.0233 11.9783 17.0338 12.1047 17.2482 12.3362L17.2561 12.3447L17.2638 12.3534C17.4214 12.5317 17.8806 12.8462 18.8437 13.2511L18.8489 13.2533C20.5846 13.9947 21.8859 14.6715 22.6443 15.2911C23.3969 15.906 23.9825 16.6514 24.3906 17.5213C24.8034 18.4012 24.9999 19.3685 24.9999 20.4051C24.9999 21.4521 24.7876 22.4396 24.3535 23.3536C23.9314 24.2422 23.3687 24.9848 22.65 25.5453C22.0828 25.9877 21.3686 26.3174 20.5438 26.5598V30H17V29H19.5438V25.7814C20.6276 25.5484 21.458 25.2068 22.035 24.7568C22.612 24.3068 23.0837 23.696 23.4502 22.9245C23.8167 22.153 23.9999 21.3132 23.9999 20.4051C23.9999 19.497 23.8284 18.6773 23.4853 17.946C23.1422 17.2147 22.651 16.5879 22.0116 16.0655C21.3722 15.5432 20.1871 14.9123 18.4561 14.173C17.4814 13.7631 16.8342 13.3774 16.5145 13.0157C16.1871 12.6621 16.0233 12.3045 16.0233 11.9429C16.0233 11.5169 16.2066 11.1433 16.573 10.8218C16.9473 10.4923 17.4307 10.3276 18.0233 10.3276C18.9017 10.3276 19.7891 10.7443 20.6853 11.5779C20.8153 11.6988 20.9455 11.8285 21.0759 11.967L23.3333 9.70073C23.1428 9.50233 22.959 9.31922 22.7818 9.1514C22.727 9.09959 22.6729 9.04923 22.6195 9.00033C22.1938 8.611 21.8079 8.31407 21.4619 8.10954C20.9395 7.79612 20.3001 7.547 19.5438 7.36216V6H17V5H20.5438V6.60855C21.067 6.78172 21.5457 6.99398 21.9736 7.25038C22.6164 7.6309 23.3121 8.23458 24.0547 9.00827L24.7318 9.71369L21.0558 13.4042Z" fill="black" />
                                            <path d="M22.3333 10.7007L20.076 12.967C19.0468 11.874 18.0292 11.3276 17.0234 11.3276C16.4308 11.3276 15.9474 11.4923 15.5731 11.8218C15.2066 12.1433 15.0234 12.5169 15.0234 12.9429C15.0234 13.3045 15.1871 13.6621 15.5146 14.0157C15.8343 14.3774 16.4815 14.7631 17.4561 15.173C19.1871 15.9123 20.3723 16.5432 21.0117 17.0655C21.6511 17.5879 22.1423 18.2147 22.4854 18.946C22.8285 19.6773 23 20.497 23 21.4051C23 22.3132 22.8168 23.153 22.4503 23.9245C22.0838 24.696 21.6121 25.3068 21.0351 25.7568C20.4581 26.2068 19.6277 26.5484 18.5439 26.7814V30H16.345V26.8538C15.3236 26.7332 14.4542 26.468 13.7368 26.0582C12.7544 25.4956 11.8421 24.7483 11 23.816L13.2222 21.4654C14.6491 23.0325 16.0292 23.816 17.3626 23.816C18.0409 23.816 18.6218 23.5749 19.1053 23.0928C19.5965 22.6026 19.8421 22.028 19.8421 21.369C19.8421 20.8145 19.6862 20.3283 19.3743 19.9104C19.0546 19.4925 18.4386 19.0666 17.5263 18.6326C15.6706 17.7486 14.4152 17.0494 13.7602 16.5351C13.1053 16.0128 12.614 15.4301 12.2865 14.7872C11.9669 14.1363 11.807 13.4451 11.807 12.7138C11.807 11.5003 12.2359 10.4637 13.0936 9.60377C13.9513 8.73585 15.0351 8.26974 16.345 8.20545V7H18.5439V8.36216C19.3002 8.547 19.9396 8.79612 20.462 9.10954C20.9922 9.42296 21.616 9.95335 22.3333 10.7007Z" fill="black" />
                                        </svg>
                                        <span><strong>Total Cost</strong></span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="order-option">
                            {{-- Перебираем все items из $order->items --}}
                            @foreach($order->items as $item)
                                @php
                                    $category = $item->category;
                                    $subtype  = $item->key;      // например: 'xl', 'full', 'under64', etc.
                                    $count    = $item->count;
                                    $priceOne = $item->price;
                                    $totalOne = $count * $priceOne;
                                @endphp
                                <tr>
                                    <td class="border-bottom border-right">
                                        <span>{{ $category }}</span>
                                    </td>
                                    <td class="border-bottom border-right">
                                        <span>{{ $subtype }}</span>
                                    </td>
                                    <td class="border-bottom border-right">
                                        <span>{{ $count }}</span>
                                    </td>
                                    <td class="border-bottom border-right">
                                        <span class="flex col aie">${{ number_format($priceOne, 2) }}</span>
                                    </td>
                                    <td class="border-bottom">
                                        <span class="flex col aie">${{ number_format($totalOne, 2) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Нижняя часть (QR, Insurance, Final cost) --}}
            <div id="orderDetailsFooter" class="flex row aic">
                    <div id="qr-wrapper" class="flex col aic">
                        <h3><strong>QR Code for Cargo</strong></h3>
                        
                        @php
                            $isBusiness = isset($order->order_type) && $order->order_type === 'Business';
                            $qrImgSrc = $isBusiness ? "data:image/png;base64,{$qrCode}" : route('orders.qr-img', $order->id);
                            $downloadUrl = $isBusiness 
                                ? route('orders.downloadQrPdfUnified', ['type' => 'business_order', 'id' => $order->id])
                                : route('orders.downloadQrPdf', $order->id);
                        @endphp

                        <img src="{{ $qrImgSrc }}" alt="Order QR Code" id="qr">
                        <a href="{{ $downloadUrl }}" class="button btn_blue">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/></svg>
                            Download QR as PDF
                        </a>
                    </div>
                <div id="costs" class="flex col aie">
                    {{-- Промежуточная стоимость (без страховки) --}}
                    <div class="flex row aic">
                        <span><strong>Total Cost</strong></span>
                        <span id="totalCost" class="size_sl">
                            ${{ number_format($totalItemsCost, 2) }}
                        </span>
                    </div>

                    {{-- Комиссия Stripe (3%) --}}
                    <div class="flex row aic">
                        <span><strong>Stripe Fee (3%)</strong></span>
                        <span id="stripeFee" class="size_sl">
                            ${{ number_format($stripeCommission, 2) }}
                        </span>
                    </div>

                    {{-- Итоговая стоимость (с учётом страховки) --}}
                    <div class="flex row aic">
                        <span><strong>Final Cost</strong></span>
                        <h3 id="finalCost" class="color-blue flex-center">
                            <strong>
                                ${{ number_format($finalCost, 2) }}
                            </strong>
                        </h3>
                    </div>
                </div>
            </div>
           {{-- Секция QR-кода инструкция --}}
           <div id="order-qr-section" class="flex col">
            <div class="flex row">
                <div id="qr-instructions" >
                    <h3><strong>Instructions for QR Code Usage:</strong></h3>
                    <ol style="padding-left: 20px;">
                        <li style="margin-bottom: 10px;">
                            <span>
                                <strong>Download the QR code for each unit of cargo.</strong><br>
                                Access the cargo management system or obtain the QR codes from your manager.
                            </span>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <span>
                                <strong>Print the QR code.</strong><br>
                                Ensure the size and print quality are sufficient for easy scanning.
                            </span>
                        </li>
                        <li style="margin-bottom: 10px;">
                            <span>
                                <strong>Attach the QR code to each unit of cargo.</strong><br>
                                Stick the label in an accessible and visible spot on the packaging (box, pallet, container, etc.).
                            </span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- Конец секции QR-кода --}}
        </div>
    </div>
</section>

<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>

@endsection

@once
@section('scripts')
{{-- Map component handles its own JavaScript --}}
@endsection
@endonce
