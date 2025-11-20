@extends('layouts.app')

@section('meta_title', 'Parcel details')

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
        {{-- Заголовок + Имя получателя (из $parcel->recipient_name) --}}
        <div class="flex col aic color-white">
            <h1>Parcel Details</h1>
            <p>{{ $parcel->recipient_name }}</p>
        </div>

        <div id="orderDitails" open class="flex col">
            {{-- Кнопка «вернуться к списку отправлений» --}}
            <div>
                <a href="{{ url('/parcels') }}" class="button transparent_btn">
                    <svg width="28" height="28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 22L10 14L15 6L17 6L12 14L17 22H15Z" />
                    </svg>
                    <span><strong class="uppercase">YOUR PARCELS</strong></span>
                </a>
            </div>

            {{-- Блок с основной информацией об отправлении --}}
            <div id="order-info" class="flex row aie">
                {{-- Секция: Номер отправления, статус, трек-номер --}}
                <div class="order-item flex col">
                    <h2 class="uppercase" id="id">Parcel #{{ $parcel->id }}</h2>
                    <div class="flex col">
                        {{-- Отображаем статус отправления через enum --}}
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
                                <span id="orderStatus">{{ $parcel->status->value ?? 'Created' }}</span>
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
                                <span id="trackNumber">{{ $parcel->track_number }}</span>
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
                        <span id="pickUp">{{ $parcel->businessOrder->pickup_address }}</span>
                    </div>
                    <div class='order-info-value flex row ais'>
                        <svg width="29" height="28" viewBox="0 0 29 28" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M14.668 23C14.668 23 20.668 14.7371 20.668 11.2727C20.668 7.8084 17.9817 5 14.668 5C11.3543 5 8.66797 7.8084 8.66797 11.2727C8.66797 14.7371 14.668 23 14.668 23ZM14.668 13.7273C15.8926 13.7273 16.8854 12.6894 16.8854 11.4091C16.8854 10.1288 15.8926 9.09091 14.668 9.09091C13.4433 9.09091 12.4506 10.1288 12.4506 11.4091C12.4506 12.6894 13.4433 13.7273 14.668 13.7273Z"
                                  fill="black"/>
                        </svg>
                        <span><strong>Delivery address</strong></span>
                        <span id="delivery">{{ $parcel->delivery_address ?? 'N/A' }}</span>
                    </div>
                </div>

                {{-- Данные клиента (имя, телефон) --}}
                <div class="order-item flex col aie">
                    <h3 class="order-sh">Customer Info</h3>
                    <div class='order-info-value flex row aic'>
                        <div class="flex row aic">
                            <span>
                                <strong id="customerName">{{ $parcel->recipient_name }}</strong>
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
                            <span class='size_xl'>
                                <strong id="customerPhone">{{ $parcel->recipient_phone ?? 'N/A' }}</strong>
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
                    <h3><strong>Live Parcel Tracking</strong></h3>
                    <x-order-map
                        :order="$parcel"
                        :mapboxApiKey="$mapData['mapboxApiKey']"
                        height="500px"
                        :showDriverLocation="true"
                        :showRoute="true"
                        :showUserLocation="false"
                    />
                </div>
            @endif

            {{-- Секция дополнительной информации --}}
            <div id="parcel-details-section" class="flex col ais">
                <h3><strong>Parcel Details</strong></h3>
                <div class="flex col">
                    @if(isset($parcel->weight))
                        <p><strong>Weight:</strong> {{ $parcel->weight }} kg</p>
                    @endif
                    @if(isset($parcel->dimensions))
                        <p><strong>Dimensions:</strong> {{ $parcel->dimensions }}</p>
                    @endif
                    @if(isset($parcel->description))
                        <p><strong>Description:</strong> {{ $parcel->description }}</p>
                    @endif
                    <p><strong>Created:</strong> {{ $parcel->created_at->format('F d, Y, h:i A') }}</p>
                    <p><strong>Last Updated:</strong> {{ $parcel->updated_at->format('F d, Y, h:i A') }}</p>
                </div>
            </div>

             {{-- Таблица --}}
            <div id="order-table-wrapper" class="flex col">
                <h3><strong>Items in this Parcel</strong></h3>
                <div class="tableWrapper">
                    <table>
                        <thead>
                                <tr>
                                    <th scope="col" class="border-right"><span>Item</span></th>
                                    <th scope="col" class="border-right"><span>Category/Group</span></th>
                                    <th scope="col" ><span>Quantity</span></th>
                                    {{-- <th scope="col" class="border-right"><span>Declared $</span></th>
                                    <th scope="col"><span>Delivery Price</span></th> --}}
                                </tr>
                            </thead>
                            <tbody  id="order-option">
                                @foreach($parcel->items as $item)
                                    <tr>
                                        <td class="border-bottom border-right"><span>{{ $item->itemCategory->name }}</span></td>
                                        <td class="border-bottom border-right"><span>{{ $item->itemCategory->group }}</span></td>
                                        <td class="border-bottom"><span>{{ $item->quantity }}</span></td>
                                        {{-- <td class="border-bottom border-right"><span>${{ number_format($item->declared_value, 2) }}</span></td>
                                        <td class="border-bottom"><span>${{ number_format($item->price, 2) }}</span></td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>

            {{-- QR Code Section --}}
            <div id="orderDetailsFooter" class="flex row aic">
                <div id="qr-wrapper" class="flex col aic">
                    <h3><strong>QR Code for Parcel</strong></h3>
                    <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(200)->generate(route('parcels.access', $parcel))) }}" alt="QR code">
                </div>
                {{-- Секция QR-кода инструкция --}}
            <div id="order-qr-section" class="flex col">
                <div class="flex row">
                    <div id="qr-instructions" >
                        <h3><strong>Instructions for QR Code Usage:</strong></h3>
                        <ol style="padding-left: 20px;">
                            <li style="margin-bottom: 10px;">
                                <span>
                                    <strong>Download the QR code for your parcel.</strong><br>
                                    Access the parcel management system or obtain the QR code from your manager.
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
                                    <strong>Attach the QR code to your parcel.</strong><br>
                                    Stick the label in an accessible and visible spot on the packaging.
                                </span>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            {{-- Конец секции QR-кода --}}
                {{-- parcel costs

                <div id="costs" class="flex col aie">
                    <div class="flex row aic">
                        <span><strong>Delivery Price</strong></span>
                        <span id="totalCost" class="size_sl">
                            ${{ number_format($parcel->price - $parcel->surcharge, 2) }}
                        </span>
                    </div>
                    <div class="flex row aic">
                        <span><strong>Declared Value</strong></span>
                        <span id="stripeFee" class="size_sl">
                            ${{ number_format($parcel->declared_value_total, 2) }}
                        </span>
                    </div>

                    <div class="flex row aic">
                        <span><strong>Surcharge (10%)</strong></span>
                        <span id="stripeFee" class="size_sl">
                            ${{ number_format($parcel->surcharge, 2) }}
                        </span>
                    </div>

                    <div class="flex row aic">
                        <span><strong>Parcel Total</strong></span>
                        <h3 id="finalCost" class="color-blue flex-center">
                            <strong>
                                ${{ number_format($parcel->price, 2) }}
                            </strong>
                        </h3>
                    </div>
                </div> --}}
            </div>




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
