<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Order №{{ $order->track_number }} — QR & Details</title>
	<style>
		body {
			font-family: DejaVu Sans, sans-serif;
			margin: 0;
			padding: 1cm;
			color: #333;
			font-size: 12px;
		}

		h1,
		h2 {
			margin: 0 0 0.5em;
			text-align: center;
		}

		h2 {
			font-size: 14px;
			margin-top: 1.5em;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 1em;
		}

		th,
		td {
			border: 1px solid #999;
			padding: 0.4em 0.6em;
			vertical-align: top;
		}

		th {
			background: #f0f0f0;
			text-align: left;
		}

		.qr {
			text-align: center;
			margin-top: 1em;
		}
	</style>
</head>

<body>

	<h1 class="uppercase">Track Number: {{ $order->track_number }}}</h1>
	<table>
		<tbody>
			<tr>
				<th>Status</td>
				<td>{{ $order->status->value ?? 'Created' }}</td>
			</tr>
			<tr>
				<th>Name</th>
				<td>{{$order->name}}</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>{{ $order->email }}</td>
			</tr>
			<tr>
				<th>Phone</th>
				<td>{{ $order->phone }}</td>
			</tr>
			<tr>
				<th>Delivery address</th>
				<td>{{ $order->deliver_address }}</td>
			</tr>
			<tr>
				<th>Pick up address</th>
				<td>{{ $order->up_address }}</td>
			</tr>

			<tr>
				<th>Status</th>
				<td>{{ $order->status->value ?? 'Created' }}</td>
			</tr>
		</tbody>
	</table>
	<h1>Ordered options</h1>
	<table>
		<thead>
			<tr>
				<th scope="col">

					<strong>Category</strong>

				</th>
				<th scope="col">
					<strong>Subtype</strong>
				</th>
				<th scope="col">
					<span><strong>Quantity</strong></span>
				</th>
				<th scope="col">
					<strong>Cost per unit</strong>
				</th>
				<th scope="col">
					<strong>Total Cost</strong>
				</th>
			</tr>
		</thead>
		<tbody id="order-option">
			{{-- Перебираем все items из $order->items --}}
			@foreach($order->items as $item)
			@php
			$category = $item->category;
			$subtype = $item->key; // например: 'xl', 'full', 'under64', etc.
			$count = $item->count;
			$priceOne = $item->price;
			$totalOne = $count * $priceOne;
			@endphp
			<tr>
				<td>
					<span>{{ $category }}</span>
				</td>
				<td>
					<span>{{ $subtype }}</span>
				</td>
				<td>
					<span>{{ $count }}</span>
				</td>
				<td>
					<span>${{ number_format($priceOne, 2) }}</span>
				</td>
				<td class="border-bottom">
					<span>${{ number_format($totalOne, 2) }}</span>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>


	{{-- Нижняя часть (QR, Insurance, Final cost) --}}
	<div class="qr">
		<p>Scan to view the order details:</p>
		<img src="data:image/png;base64,{{ $qrData }}" width="200" height="200" alt="QR Code">
	</div>




</body>

</html>