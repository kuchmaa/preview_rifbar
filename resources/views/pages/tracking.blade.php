@extends('layouts.app')

@section('meta_title', 'Shipment Tracking | NYC Freight & Package Delivery | Duma Shipping')

@section('meta_description', 'Track your shipment with Duma Shipping. Real-time NYC freight and New York package delivery updates. Enter your tracking number to check status, route and estimated delivery time.')

@section('content')

<section id="formSection" class="wrapper hero flex-center">
    <img loading="lazy" src="/imgs/tracking_img.webp"
    alt="A man loads boxes into a Duma Shipping vehicle" class="{{!isset($result) ? 'hero_section_img' : 'hero_section_img hero_section_img-1'}}">
	<div class="hero-content flex-center col">
        @if(!isset($result))
		<h1 id="trackingH1" class="color-blue" active>Tracking</h1>
        <form id="trackingNumber" class="hero-element flex col" active>
			<div class="flex col">
				<div id="number" class="text-input flex col" @if ($errors->has('track_number')) error @endif>
					<span>Tracking number</span>
					<div class="inputWrapper flex row aic" >
						<span class="placeholder flex-center" hidden></span>
						<input type="text" name="track_number" placeholder="Enter your tracking number...">
					</div>
					<span class="error-message">{{ $errors->first('track_number') }}</span>
				</div>
				<div class="flex row banner">
					<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M37 20C37 29.0563 29.9184 36.4587 20.9905 36.9716L21 37H3L7.6284 31.6595C4.7588 28.6158 3 24.5133 3 20C3 10.6112 10.6112 3 20 3C29.3888 3 37 10.6112 37 20ZM21 12V10H19V12H21ZM21 29L21 15H19V29H21Z" fill="#304FFF"></path>
					</svg>
					<span class='size_ml'>
						Your tracking number is listed in <br> the order confirmation
					</span>
				</div>
			</div>
			<button id="track" class="btn_blue flex-center" disabled>
				Track
				<svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M16.5 7L20.5 14L16.5 21H14.5L18.5 14L14.5 7L16.5 7Z" />
					<path d="M18.6424 15.0002L8.5 15.0003L8.5003 13.0002L18.6427 13.0001L18.6424 15.0002Z" />
				</svg>
			</button>
		</form>
        @else
        <div id="trackingInfoWrapper" class="flex col hero-element">
            <h1 active>{{ $type === 'order' ? 'Order' : 'Parcel' }} Details</h1>
            <div id="orderDitails" open class="flex col">
                {{-- Блок с основной информацией об отправлении --}}
                <div id="order-info" class="flex row aie between">
                    {{-- Секция: Номер, статус, трек-номер --}}
                    <div class="order-item flex col ">
                        <h2 class="uppercase" id="id">{{ $type === 'order' ? 'Order' : 'Parcel' }} #{{ $result->id }}</h2>
                        <div class="flex col">
                            {{-- Статус --}}
                            <div class="order-info-value flex row aic">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="60" height="60" rx="30" fill="#304FFF"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18.8567 24.2143L18.5231 25.5004L27.0186 25.5026L26.6989 26.7883L18.1897 26.7861L17.3568 29.9974H23.1825L22.8628 31.2831H17.0233L15.8555 35.7857L21.3872 35.7857C21.3855 36.6771 21.6966 37.4357 22.3206 38.0614C22.9446 38.6871 23.6991 39 24.584 39C25.4705 39.0009 26.225 38.688 26.8473 38.0614C27.4696 37.4349 27.7807 36.6762 27.7807 35.7857H33.8802C33.881 36.678 34.1922 37.4366 34.8137 38.0614C35.4351 38.6863 36.1891 38.9991 37.0757 39C37.9623 39.0009 38.7167 38.688 39.339 38.0614C39.9613 37.4349 40.2725 36.6762 40.2725 35.7857H41.7481L42.8555 30.1491L39.3876 25.5H36.7292L37.7649 21L23.0832 21L22.2496 24.2143H18.8567ZM22.6659 35.7857C22.6659 36.3146 22.8539 36.7684 23.2298 37.1473C23.6066 37.5253 24.058 37.7143 24.584 37.7143C25.1099 37.7143 25.5613 37.5253 25.9381 37.1473C26.3141 36.7684 26.502 36.3146 26.502 35.7857C26.502 35.2569 26.3141 34.803 25.9381 34.4241C25.5622 34.0453 25.1108 33.8563 24.584 33.8571C24.0571 33.858 23.6057 34.047 23.2298 34.4241C22.8539 34.803 22.6659 35.2569 22.6659 35.7857ZM35.3085 31.6071H41.2558L41.4821 30.4629L38.7482 26.7857H36.4235L35.3085 31.6071ZM37.077 37.7143C37.6029 37.7143 38.0539 37.5253 38.4298 37.1473C38.8058 36.7684 38.9938 36.3146 38.9938 35.7857C38.9938 35.2569 38.8058 34.803 38.4298 34.4241C38.0539 34.0453 37.6025 33.8563 37.0757 33.8571C36.5489 33.858 36.0979 34.047 35.7228 34.4241C35.346 34.803 35.1576 35.2569 35.1576 35.7857C35.1576 36.3146 35.3456 36.7684 35.7215 37.1473C36.0983 37.5253 36.5501 37.7143 37.077 37.7143Z" fill="white"/>
                                </svg>
                                <div class="flex col">
                                    <span><strong>Status</strong></span>
                                    <span id="orderStatus">{{ $type === 'order' ? $result->status->name : $result->status->value }}</span>
                                </div>
                            </div>
                            {{-- Трек-номер --}}
                            <div class="order-info-value flex row aic">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="1" y="1" width="58" height="58" rx="29" stroke="#304FFF" stroke-width="2"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M40 24.4545C40 30.2284 30 44 30 44C30 44 20 30.2284 20 24.4545C20 18.6807 24.4772 14 30 14C35.5228 14 40 18.6807 40 24.4545ZM30 31C33.866 31 37 27.866 37 24C37 20.134 33.866 17 30 17C26.134 17 23 20.134 23 24C23 27.866 26.134 31 30 31ZM31 23V19H29V25H33V23H31Z" fill="#304FFF"/>
                                </svg>
                                <div class="flex col">
                                    <span><strong>Track Number</strong></span>
                                    <span id="trackNumber">{{ $result->track_number }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Адреса --}}
                    <div class="order-item flex col">
                        <h3 class="order-sh">Addresses</h3>
                        <div class='order-info-value flex row ais'>
                            <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.668 23C14.668 23 20.668 14.7371 20.668 11.2727C20.668 7.8084 17.9817 5 14.668 5C11.3543 5 8.66797 7.8084 8.66797 11.2727C8.66797 14.7371 14.668 23 14.668 23ZM14.668 13.7273C15.8926 13.7273 16.8854 12.6894 16.8854 11.4091C16.8854 10.1288 15.8926 9.09091 14.668 9.09091C13.4433 9.09091 12.4506 10.1288 12.4506 11.4091C12.4506 12.6894 13.4433 13.7273 14.668 13.7273Z" fill="black"/></svg>
                            <span><strong>Pick up address</strong></span>
                            <span id="pickUp">{{ $type === 'order' ? $result->up_address : $result->businessOrder->pickup_address }}</span>
                        </div>
                        <div class='order-info-value flex row ais'>
                            <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.668 23C14.668 23 20.668 14.7371 20.668 11.2727C20.668 7.8084 17.9817 5 14.668 5C11.3543 5 8.66797 7.8084 8.66797 11.2727C8.66797 14.7371 14.668 23 14.668 23ZM14.668 13.7273C15.8926 13.7273 16.8854 12.6894 16.8854 11.4091C16.8854 10.1288 15.8926 9.09091 14.668 9.09091C13.4433 9.09091 12.4506 10.1288 12.4506 11.4091C12.4506 12.6894 13.4433 13.7273 14.668 13.7273Z" fill="black"/></svg>
                            <span><strong>Delivery address</strong></span>
                            <span id="delivery">{{ $type === 'order' ? $result->deliver_address : $result->delivery_address }}</span>
                        </div>
                    </div>
                    {{-- Данные клиента --}}
                    <div class="order-item flex col aie">
                        <h3 class="order-sh">Customer Info</h3>
                        <div class='order-info-value flex row aic'>
                            <div class="flex row aic">
                                <span><strong id="customerName">{{ $type === 'order' ? $result->name : $result->recipient_name }}</strong></span>
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 12C16.433 12 18 10.433 18 8.5C18 6.567 16.433 5 14.5 5C12.567 5 11 6.567 11 8.5C11 10.433 12.567 12 14.5 12ZM14 18C10.829 18 8.15043 20.1085 7.28988 23H20.7101C19.8496 20.1085 17.171 18 14 18ZM22.777 23C21.8675 18.992 18.2832 16 14 16C9.71683 16 6.13247 18.992 5.22302 23C5.07706 23.6432 5 24.3126 5 25H23C23 24.3126 22.9229 23.6432 22.777 23ZM14.5 14C17.5376 14 20 11.5376 20 8.5C20 5.46243 17.5376 3 14.5 3C11.4624 3 9 5.46243 9 8.5C9 11.5376 11.4624 14 14.5 14Z" fill="#304FFF"/></svg>
                            </div>
                        </div>
                        @if($type === 'order')
                            <div class='order-info-value flex row aic'>
                                <div class="flex row aic">
                                    <span id="customerEmail">{{ $result->email }}</span>
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24 6H4V22H24V6ZM22 10L14 15L6 10V8L14 13L22 8V10Z" fill="black"/></svg>
                                </div>
                            </div>
                        @endif
                        <div class='order-info-value flex row aic'>
                            <div class="flex row aic">
                                <span class='size_xl'><strong id="customerPhone">{{ $type === 'order' ? $result->phone : $result->recipient_phone }}</strong></span>
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24.0001 21.92V18.92C24.0123 18.4296 24 18 24 18L18 16C18 16 17.632 16.3712 17.3601 16.64L16.0901 17.91C13.5866 16.4865 11.5137 14.4136 10.0901 11.91L11.3601 10.64C11.629 10.3681 12 9.99996 12 9.99996L10 3.99996C10 3.99996 9.59542 3.99524 9.11012 4.00002H6.11012H4L4.12012 6.18002C4.44836 9.27101 5.5001 12.2412 7.19012 14.85C8.72545 17.2662 10.7739 19.3147 13.1901 20.85C15.7871 22.5342 18.743 23.5857 21.8201 23.92L24 24L24.0001 21.92Z" fill="black"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Карта --}}
                @if(!empty($mapData['mapboxApiKey']))
                    <div id="map-container">
                        <h3><strong>Live Tracking</strong></h3>
                        <x-order-map :order="$result" :mapboxApiKey="$mapData['mapboxApiKey']" height="500px" :showDriverLocation="true" :showRoute="true" :showUserLocation="false" />
                    </div>
                @endif

                {{-- Таблица с товарами --}}
                <div id="order-table-wrapper" class="flex col">
                    <h3><strong>{{ $type === 'order' ? 'Ordered options' : 'Items in this Parcel' }}</strong></h3>
                    <div class="tableWrapper">
                        <table>
                            @if($type === 'order')
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-right"><span>Category</span></th>
                                        <th scope="col" class="border-right"><span>Subtype</span></th>
                                        <th scope="col" class="border-right"><span>Quantity</span></th>
                                        <th scope="col" class="border-right"><span>Cost per unit</span></th>
                                        <th scope="col"><span>Total Cost</span></th>
                                    </tr>
                                </thead>
                                <tbody id="order-option">
                                    @foreach($result->items as $item)
                                        <tr>
                                            <td class="border-bottom border-right"><span>{{ $item->category }}</span></td>
                                            <td class="border-bottom border-right"><span>{{ $item->key }}</span></td>
                                            <td class="border-bottom border-right"><span>{{ $item->count }}</span></td>
                                            <td class="border-bottom border-right"><span>${{ number_format($item->price, 2) }}</span></td>
                                            <td class="border-bottom"><span>${{ number_format($item->price * $item->count, 2) }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-right"><span>Item</span></th>
                                        <th scope="col" class="border-right"><span>Category/Group</span></th>
                                        <th scope="col"><span>Quantity</span></th>
                                        {{-- <th scope="col" class="border-right"><span>Declared $</span></th>
                                        <th scope="col"><span>Delivery Price</span></th> --}}
                                    </tr>
                                </thead>
                                <tbody id="order-option">
                                    @foreach($result->items as $item)
                                        <tr>
                                            <td class="border-bottom border-right"><span>{{ $item->itemCategory->name }}</span></td>
                                            <td class="border-bottom border-right"><span>{{ $item->itemCategory->group }}</span></td>
                                            <td class="border-bottom"><span>{{ $item->quantity }}</span></td>
                                            {{-- <td class="border-bottom border-right"><span>${{ number_format($item->declared_value, 2) }}</span></td>
                                            <td class="border-bottom"><span>${{ number_format($item->price, 2) }}</span></td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>

                {{-- Подвал с QR и стоимостью --}}
                <div id="orderDetailsFooter" class="flex row aic between wrap">
                    <div id="qr-wrapper" class="flex col aic @if($type !== 'order') w-full @endif">
                        <h3><strong>QR Code</strong></h3>
                        @if($type === 'order')
                             @php
                                $qrImgSrc = route('orders.qr-img', $result->id);
                                $downloadUrl = route('orders.downloadQrPdf', $result->id);
                            @endphp
                            <img loading="lazy" src="{{ $qrImgSrc }}" alt="Order QR Code" id="qr">
                            <a href="{{ $downloadUrl }}" class="button btn_blue">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/></svg>
                                Download QR as PDF
                            </a>
                        @else
                            <img loading="lazy" src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(200)->generate(route('parcels.access', $result))) }}" alt="QR code">
                        @endif
                    </div>
                    <div id="costs" class="flex col aie w-full">
                        @if($type === 'order')
                            <div class="flex row aic">
                                <span class="h3"><strong>Total Cost</strong></span>
                                <span id="totalCost" class="size_sl h3">${{ number_format($totalItemsCost, 2) }}</span>
                            </div>
                            <div class="flex row aic">
                                <span class="h3"><strong>Stripe Fee (3%)</strong></span>
                                <span id="stripeFee" class="size_sl h3">${{ number_format($stripeCommission, 2) }}</span>
                            </div>
                            <div class="flex row aic">
                                <span class="h2"><strong>Final Cost</strong></span>
                                <h3 id="finalCost" class="color-blue h2 flex-center"><strong>${{ number_format($finalCost, 2) }}</strong></h3>
                            </div>
                        {{-- @else --}}
                             {{-- <div class="flex row aic">
                                <span class="h3"><strong>Delivery Price</strong></span>
                                <span id="totalCost" class="size_sl h3">${{ number_format($result->price - $result->surcharge, 2) }}</span>
                            </div> --}}
                            {{-- <div class="flex row aic">
                                <span class="h3"><strong>Declared Value</strong></span>
                                <span id="stripeFee" class="size_sl h3">${{ number_format($result->declared_value_total, 2) }}</span>
                            </div>
                            <div class="flex row aic">
                                <span class="h3"><strong>Surcharge (10%)</strong></span>
                                <span id="stripeFee" class="size_sl h3">${{ number_format($result->surcharge, 2) }}</span>
                            </div>
                            <div class="flex row aic">
                                <span class="h3"><strong>Parcel Total</strong></span>
                                <h3 id="finalCost" class="color-blue h3 flex-center"><strong>${{ number_format($result->price, 2) }}</strong></h3>
                            </div> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
	</div>
</section>
<section id="section2Wrapper" class="wrapper section-content">
	<span class="section-border section-border_top_l"></span>
	<div id="section1" class="flex col aic tai_c" active>
		<h2 class="txt-block">Real-time tracking</h2>
		<p class="txt-block">
			a sub-brand of DUMA, dedicated <br> to providing specialized logistics solutions across the USA
		</p>
	</div>
	<div id="section2" class="flex col aic tai_c">
		<div class="txt-block">
			<p>Stay updated with real-time <br>shipment monitoring</p>
			<h2>Have questions?</h2>
		</div>
		<div class="txt-block flex-center">
			<button class="flex-center btn_blue">
				<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M24.5001 22.42V19.42C24.5123 18.9296 24.5 18.5 24.5 18.5L18.5 16.5C18.5 16.5 18.132 16.8712 17.8601 17.14L16.5901 18.41C14.0866 16.9865 12.0137 14.9136 10.5901 12.41L11.8601 11.14C12.129 10.8681 12.5 10.5 12.5 10.5L10.5 4.49996C10.5 4.49996 10.0954 4.49524 9.61012 4.50001H6.61012H4.5L4.62012 6.68001C4.94836 9.77101 6.0001 12.7412 7.69012 15.35C9.22545 17.7662 11.2739 19.8147 13.6901 21.35C16.2871 23.0342 19.243 24.0857 22.3201 24.42L24.5 24.5L24.5001 22.42Z" />
				</svg>

				<strong>Contact Us</strong>
			</button>
		</div>
	</div>
	<span class="section-border section-border_bottom_r"></span>
</section>
<section class="section_call w-full flex-center ">
	<div class="wrapper flex-center section-content">
		<div class="flex col aic">
			<div class="flex col aic tai_c">
				<p>Duma Shipping is here </p>
                <h2>
                    to simplify the process and give you <br><strong>peace of mind</strong>
                </h2>
			</div>
			<div class="flex row aic">
				<a href="/calculator" class="button btn_white">
					Сalculate shipping cost
					<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" />
					</svg>
				</a>
				<a href="/contacts" class="button btn_blue">
					<svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M24.5001 22.42V19.42C24.5123 18.9296 24.5 18.5 24.5 18.5L18.5 16.5C18.5 16.5 18.132 16.8712 17.8601 17.14L16.5901 18.41C14.0866 16.9865 12.0137 14.9136 10.5901 12.41L11.8601 11.14C12.129 10.8681 12.5 10.5 12.5 10.5L10.5 4.49996C10.5 4.49996 10.0954 4.49524 9.61012 4.50001H6.61012H4.5L4.62012 6.68001C4.94836 9.77101 6.0001 12.7412 7.69012 15.35C9.22545 17.7662 11.2739 19.8147 13.6901 21.35C16.2871 23.0342 19.243 24.0857 22.3201 24.42L24.5 24.5L24.5001 22.42Z" />
					</svg>
					Contact Us
				</a>
			</div>
		</div>
	</div>
</section>

<section id="slider" class="wrapper section-content bg-blue">
	<div class="flex col">
		<div>
			<span class="color-white">Сurrent favorable offers</span>
			<h1 class="color-white">AFFORDABLE PRICE</h1>
		</div>
		<div class="slider flex row aic" id="affordableSlider">
			<div class="slider-controls flex row">
				<div class="slider-back">
					<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M15 22.5L10 14.5L15 6.5L17 6.5L12 14.5L17 22.5H15Z" fill="white" />
					</svg>
				</div>
				<div class="slider-next">
					<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 6.5L17 14.5L12 22.5H10L15 14.5L10 6.5L12 6.5Z" fill="white" />
					</svg>
				</div>
			</div>
			<div class="slider-pages flex col aic">
				<div id="shipWhitUs" class="slider-page flex row aic" current>
					<div id="map"></div>
					<svg width="386" height="122" viewBox="0 0 386 122" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 46.0942L17.8387 42.8395C19.3362 47.9566 23.1881 50.513 29.3967 50.513C34.228 50.513 36.6437 49.2115 36.6437 46.6064C36.6437 45.2428 36.0862 44.1808 34.9691 43.4204C33.852 42.6599 31.8583 41.9881 28.9835 41.3983C18.0048 39.2654 10.959 36.4763 7.84159 33.0331C4.72419 29.5899 3.1655 25.5436 3.1655 20.8898C3.1655 14.9036 5.40408 9.92611 9.88342 5.95522C14.3628 1.98434 20.8053 0 29.2131 0C41.9625 0 50.3856 5.19475 54.4824 15.582L38.5696 20.4664C36.9191 16.2183 33.57 14.0943 28.5266 14.0943C24.338 14.0943 22.2437 15.4135 22.2437 18.0475C22.2437 19.227 22.7181 20.1404 23.6647 20.7923C24.6113 21.4441 26.4476 22.0627 29.1693 22.6502C36.6611 24.2577 41.9822 25.6789 45.1323 26.9138C48.2825 28.151 50.9102 30.2639 53.0198 33.2592C55.1273 36.2524 56.1832 39.7843 56.1832 43.8483C56.1832 50.2713 53.6145 55.4771 48.4793 59.4635C43.3419 63.4499 36.6021 65.4432 28.2555 65.4432C12.9986 65.4432 3.58304 58.9935 0.00436983 46.0942H0Z" fill="black" />
						<path d="M116.625 0.977758V64.4654H97.4089V39.7687H82.7335V64.4654H63.5176V0.977758H82.7335V24.3264H97.4089V0.977758H116.625Z" fill="black" />
						<path d="M146.708 0.977758V64.4654H127.492V0.977758H146.708Z" fill="black" />
						<path d="M177.115 41.3961V64.4654H157.623V0.977758H184.36C191.025 0.977758 196.092 1.75375 199.562 3.30353C203.031 4.85553 205.783 7.22564 207.817 10.4205C209.85 13.6154 210.866 17.1961 210.866 21.1648C210.866 27.2109 208.787 32.0952 204.629 35.8156C200.471 39.5359 194.923 41.3961 187.982 41.3961H177.113H177.115ZM176.839 27.7696H183.26C188.915 27.7696 191.744 25.6611 191.744 21.4441C191.744 17.4755 189.13 15.4911 183.903 15.4911H176.839V27.7696Z" fill="black" />
						<path d="M152.558 72.8617L139.905 121.248H127.601L120.927 94.5564L114.624 121.248H101.796L89.1213 72.8617H102.903L109.577 100.711L116.087 72.8617H127.584L134.667 100.764L141.35 72.8617H152.558Z" fill="black" />
						<path d="M171.85 72.8617V121.248H157.206V72.8617H171.85Z" fill="black" />
						<path d="M199.778 84.4551V121.251H185.903V84.4551H176.011V72.8639H209.668V84.4551H199.776H199.778Z" fill="black" />
						<path d="M254.302 72.8617V121.248H239.657V102.425H228.473V121.248H213.828V72.8617H228.473V90.6564H239.657V72.8617H254.302Z" fill="black" />
						<path d="M319.173 72.8617V104.906C319.173 110.979 317.395 115.344 313.843 118.005C310.288 120.663 305.658 121.993 299.95 121.993C293.938 121.993 289.109 120.716 285.463 118.164C281.816 115.612 279.993 111.453 279.993 105.686V72.8617H294.883V103.95C294.883 106.267 295.364 107.957 296.33 109.019C297.294 110.083 298.833 110.613 300.949 110.613C302.716 110.613 304.161 110.229 305.289 109.46C306.417 108.693 307.09 107.824 307.311 106.855C307.532 105.886 307.643 103.995 307.643 101.183V72.8617H319.177H319.173Z" fill="black" />
						<path d="M322.074 107.247L335.669 104.766C336.81 108.666 339.746 110.615 344.477 110.615C348.159 110.615 349.999 109.622 349.999 107.637C349.999 106.598 349.573 105.788 348.723 105.21C347.872 104.631 346.351 104.117 344.16 103.669C335.794 102.044 330.423 99.9173 328.046 97.2945C325.67 94.6716 324.483 91.5854 324.483 88.0402C324.483 83.4795 326.19 79.6838 329.603 76.6596C333.015 73.6332 337.927 72.1211 344.335 72.1211C354.052 72.1211 360.471 76.0787 363.592 83.9961L351.464 87.7187C350.205 84.4817 347.654 82.8632 343.81 82.8632C340.619 82.8632 339.023 83.8675 339.023 85.8762C339.023 86.7742 339.383 87.4704 340.107 87.967C340.828 88.4636 342.228 88.9359 344.302 89.3837C350.012 90.6076 354.068 91.6918 356.468 92.6341C358.868 93.5763 360.871 95.1882 362.478 97.4696C364.084 99.7511 364.887 102.443 364.887 105.54C364.887 110.435 362.93 114.402 359.015 117.442C355.099 120.479 349.962 122 343.6 122C331.972 122 324.795 117.085 322.069 107.254L322.074 107.247Z" fill="black" />
						<path d="M386 72.8617L382.015 104.941H373.172L369.431 72.8617H386ZM384.356 108.311V121.251H370.866V108.311H384.356Z" fill="black" />
					</svg>
					<img loading="lazy" src="/svg/logoPath.svg">
				</div>
				<div class="ellipses flex row aic">

				</div>
			</div>

		</div>
	</div>
</section>

<section id="using" class="wrapper section-content">
	<div class="flex row">
		<div id="knowStatus" class="flex col">
			<div class="flex col ais">
				<p>Using cutting-edge technology,</p>
				<h2>
					we offer <br><strong class="light-orange">real-time tracking</strong>
				</h2>
			</div>
			<div class="flex col">
				<h2 class="tai_r">
					so you always know the status <br> of your shipment
				</h2>
			</div>
		</div>
	</div>
</section>
<div id="scroll-wrapper" class="wrapper flex">
	<div id="scrollTop" class="flex-center">
		<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M10 19L18 14L26 19V21L18 16L10 21L10 19Z" fill="#304FFF" />
		</svg>
	</div>
</div>

<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>

@endsection

@push('styles')
<!-- Стили, специфичные только для этой страницы -->
<link rel="stylesheet" href="{{ asset('css/components/call.css') }}">
<link rel="stylesheet" href="{{ asset('css/tracking.css') }}">
@endpush

@push('scripts')
<!-- Скрипты, специфичные только для этой страницы -->
@vite('resources/js/pages/tracking.js')
@endpush
