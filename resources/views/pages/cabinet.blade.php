@extends('layouts.app')

@section('meta_title', 'Cabinet | Duma Shipping')
@section('meta_description', 'User cabinet for Duma Shipping')


@push('styles')
<link rel="stylesheet" href="{{ asset('css/cabinet.css') }}">
<link rel="stylesheet" href="{{ asset('css/components/geography.css') }}">
@endpush

@section('content')
<!-- Выводим информацию о пользователе -->
<section id="ordersSetionWrapper" class="wrapper section-content bg-blue">
	<div class="flex-center col section-remove-db_lr">
		@if($user)
		<div class="flex col aic color-white" style="margin: 1rem;">
			<h1>Your profile</h1>
			<p>{{ $user->name }}</p>
			<p>Email: {{ $user->email }}</p>
			<!-- Форма разлогинивания -->
			<form id="logoutForm" action="{{ route('logout') }}" method="POST" style="margin-top: 1rem;">
				@csrf
				<button type="submit" class="btn btn-secondary">Logout</button>
			</form>
		</div>
		@else
		<div class="flex col aic color-white">
			<h1>Guest</h1>
		</div>
		@endif
		<div id="orders" open>
			<div class="tableWrapper flex col">
				<h2 class="uppercase"><strong>Your orders</strong></h2>
				<table>
					<thead>
						<tr>
							<th scope="col" class="border-right">
								<span><strong class="uppercase">ID</strong></span>
							</th>
                            {{-- <th scope="col" class="border-right">
								<span><strong class="uppercase">Type</strong></span>
							</th> --}}
							<th scope="col" class="border-right">
								<span class="t-svg">
									<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M12.4444 16.9H14.6667V19.1H12.4444V16.9ZM12.4444 21.3H14.6667V23.5H12.4444V21.3ZM16.8889 16.9H19.1111V19.1H16.8889V16.9ZM16.8889 21.3H19.1111V23.5H16.8889V21.3ZM21.3333 16.9H23.5556V19.1H21.3333V16.9ZM21.3333 21.3H23.5556V23.5H21.3333V21.3Z" fill="black" />
										<path d="M8.00001 29H28C28 29 28 28.0133 28 26.8V11.4C28 10.1867 28 9.2 28 9.2H23.5556V7H21.3333V9.2H14.6667V7H12.4444V9.2H8.00006C8.00006 9.2 8 10.1867 8 11.4V26.8C8 28.0133 8.00001 29 8.00001 29ZM25.7778 13.6L25.7789 26.8H10.2222V13.6H25.7778Z" fill="black" />
									</svg>
									<strong>Date</strong>
								</span>
							</th>
							<th scope="col" class="border-right">
								<span class="t-svg">
									<svg width="37" height="36" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M21.1926 28.4859L8.16406 28.4863L8.16449 14.4224L21.1931 14.4219L21.1926 28.4859Z" fill="black" />
										<path d="M22.9298 12.8756L9.90121 12.8761L15.7069 8.00044L28.7355 8L22.9298 12.8756Z" fill="black" />
										<path d="M22.9298 26.6323V12.8756L28.7355 8V20.2929L22.9298 26.6323Z" fill="black" />
									</svg>
									<strong>Status</strong>
								</span>
							</th>
							<th scope="col" class="border-right">
								<span class="t-svg">
									<svg width="37" height="36" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M21.1926 28.4859L8.16406 28.4863L8.16449 14.4224L21.1931 14.4219L21.1926 28.4859Z" fill="black" />
										<path d="M22.9298 12.8756L9.90121 12.8761L15.7069 8.00044L28.7355 8L22.9298 12.8756Z" fill="black" />
										<path d="M22.9298 26.6323V12.8756L28.7355 8V20.2929L22.9298 26.6323Z" fill="black" />
									</svg>
									<strong>Order amount</strong>
								</span>
							</th>
							<th scope="col">
								<span class="t-svg">
									<svg width="37" height="36" viewBox="0 0 37 36" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M21.1926 28.4859L8.16406 28.4863L8.16449 14.4224L21.1931 14.4219L21.1926 28.4859Z" fill="black" />
										<path d="M22.9298 12.8756L9.90121 12.8761L15.7069 8.00044L28.7355 8L22.9298 12.8756Z" fill="black" />
										<path d="M22.9298 26.6323V12.8756L28.7355 8V20.2929L22.9298 26.6323Z" fill="black" />
									</svg>
									<strong>Actions</strong>
								</span>
							</th>
						</tr>
					</thead>
					<tbody id="order-list">
    @forelse($orders as $order)
        @php
            $isBusiness = $order->order_type === 'Business';

            // Эта логика сгенерирует правильную ссылку
            $detailsUrl = $isBusiness
                ? route('cabinet.business-orders.show', $order->id)
                : route('cabinet.show', $order->id);

            $trackNumber = $isBusiness
                ? ($order->parcels->first()->track_number ?? 'N/A')
                : $order->track_number;
        @endphp
        <tr>
            <th class="border-right {{ $loop->last ? '' : 'border-bottom' }}">
                <span>{{ $trackNumber }}</span>
            </th>
            <td class="border-right {{ $loop->last ? '' : 'border-bottom' }}">
                @if($order->created_at)
                <span class="size_ml">{{ $order->created_at->format('m/d/Y') }}</span>
                <span class="size_ml">{{ $order->created_at->format('H:i') }}</span>
                @else
                <span class="size_ml">N/A</span>
                @endif
            </td>
            <td class="border-right {{ $loop->last ? '' : 'border-bottom' }}">
                <span>{{ $order->status->value ?? $order->status }}</span>
                @if($isBusiness)
                    <span style="display: block; font-size: 0.8em; color: #007bff;">(Business)</span>
                @endif
            </td>
            <td class="border-right {{ $loop->last ? '' : 'border-bottom' }}">
                <span>${{ number_format($order->finalCost ?? 0, 2) }}</span>
            </td>
            <td class="{{ $loop->last ? '' : 'border-bottom' }}">
                <a href="{{ $detailsUrl }}">
                    <button class="uppercase table-button"><strong>Details</strong></button>
                </a>
            </td>
        </tr>
        <tr class="mobile-buttons">
            <td colspan="3">
                <div class="table-buttons">
                    <a href="{{ $detailsUrl }}">
                        <button class="uppercase table-button"><strong>Details</strong></button>
                    </a>
                </div>
            </td>
        </tr>
    @empty
        <tr id="noItems">
            <td colspan="5">
                <p>No orders found.</p>
            </td>
        </tr>
    @endforelse
</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>

<script async>
	// Пример замены логотипа и перекрашивания иконок (если нужно)
	document.getElementsByClassName('logo')[0].src = "/svg/logo-black.svg";
	Array.from(document.getElementsByTagName('header')[0].getElementsByTagName('a')).forEach((item) => {
		item.innerHTML = item.innerHTML.replaceAll('fill="black"', 'fill="var(--light-orange)"');
	});
</script>

@push('scripts')
@vite(['resources/js/pages/cabinet.js'])
@endpush

@endsection






<!--{{-- Пример модального окна (если нужно) --}}
<form id="problemModalForm" class="flex col dropdown">
	<div class="flex row aic">
		<h3><strong>Shipping problem</strong></h3>
		<div id="closeModal">
			<svg width="28" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M18 22.5L13 14.5L18 6.5L20 6.5L15 14.5L20 22.5H18Z" fill="black"></path>
				<path d="M10 22.5L15 14.5L10 6.5L8 6.5L13 14.5L8 22.5H10Z" fill="black"></path>
			</svg>
		</div>
	</div>
	<div class="flex col">
		<div id="idInputWrapper" class="text-input flex col">
			<span>Order ID</span>
			<div class="text-input-select flex row aic">
				<span class="placeholder flex-center" hidden="">ID</span>
				<input type="text" name="id" placeholder="type id...">
			</div>
			<span class="error-message"></span>
		</div>
		<div class="flex text-input col">
			<span>Problem Type</span>
			<div id="problemTypes" class="flex row">
				<div class="notifyType-item notifyType-item_blue"><span class="size_sl">Problem Type 1</span></div>
				<div class="notifyType-item notifyType-item_blue"><span class="size_sl">Problem Type 2</span></div>
			</div>
		</div>
		<div class="text-input flex col">
			<span>Massage</span>
			<textarea id="messageTextArea" name="message" placeholder="Write your message..."></textarea>
		</div>
	</div>
	<button class="btn_blue flex-center">
		Submit
		<svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M16.5 7L20.5 14L16.5 21H14.5L18.5 14L14.5 7L16.5 7Z"></path>
			<path d="M18.6424 15.0002L8.5 15.0003L8.5003 13.0002L18.6427 13.0001L18.6424 15.0002Z"></path>
		</svg>
	</button>
</form>

<script async>
	// Пример замены логотипа и перекрашивания иконок (если нужно)
	document.getElementsByClassName('logo')[0].src = "/svg/logo2.svg";
	Array.from(document.getElementsByTagName('header')[0].getElementsByTagName('a')).forEach((item) => {
		item.innerHTML = item.innerHTML.replaceAll('fill="black"', 'fill="var(--light-orange)"');
	});
</script>-->
