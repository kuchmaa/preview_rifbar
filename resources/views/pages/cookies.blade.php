@extends('layouts.app')


@section('meta_title', 'TERMS & CONDITION | DUMA SHIPPING NYC')

@section('meta_description', 'Legal terms for Duma Shipping NYC shipping services. Read our cookie policy.')

@section('content')
	<style>
		h1, h2, h3{
			text-transform: none;
		}
		p{
			margin-top: 0px;
		}
		h2{
			margin-bottom: 12px;
		}
		.li_h2::marker, .li_h3::marker, table{
			font-family: var(--main-font);
		}
		.li_h2::marker{
			font-size: 36px;
		}
		.li_h3::marker{
			font-size: 24px;
		}
		table{
			border-collapse: collapse;
			margin: 10px 0;
		}
		th, td {
			border: 1px solid #6f6f6f;
			padding: 8px;
		}
	</style>

<section class="wrapper" style="margin-bottom: 60px;">
	<h1>COOKIE POLICY</h1>
	<p><em>Last updated: 24 May 2025</em></p>
	<ol>
		<li class="size_md li_h2">
			<div>
				<h2>What are cookies?</h2>
				<p>Cookies are small text files stored on your device when you visit a website. They enable core functionality (e.g., login), remember preferences and help us analyze site usage.</p>
			</div>
		</li>
		<li class="size_md li_h2">
			<div>
				<h2>Types of Cookies We Use</h2>
				<div style="overflow: auto; width: 100%;">
					<table>
						<thead>
							<th>Type</th>
							<th>Purpose</th>
							<th>Lifespan</th>
						</thead>
						<tbody>
							<tr>
								<td>Strictly necessary</td>
								<td>Enable page navigation, secure areas, rate-limiting</td>
								<td>Session</td>
							</tr>
							<tr>
								<td>Preferences</td>
								<td>Remember language, saved addresses</td>
								<td>Up to 1 year</td>
							</tr>
							<tr>
								<td>Analytics</td>
								<td>Measure traffic and performance (Google Analytics)</td>
								<td>1 day – 2 years</td>
							</tr>
							<tr>
								<td>Marketing</td>
								<td>Track referrals and campaign effectiveness</td>
								<td>Up to 90 days</td>
							</tr>
					</table>
				</div>
			</div>
		</li>
		<li class="size_md li_h2">
			<div>
				<h2>Managing Cookies</h2>
				<p>
					Most browsers let you:
					<ul>
						<li><span><strong>View</strong> stored cookies</span></li>
						<li><span><strong>Delete</strong> cookies individually or in bulk</span></li>
						<li><span>
							<strong>Block</strong> third-party or all cookies
							<br>
							Blocking cookies may impair certain features (saved quotes, checkout).</span></li>
					</ul>
				</p>
			</div>
		</li>
		<li class="size_md li_h2">
			<div>
				<h2>Third-Party Cookies</h2>
				<p>
					Our site may embed third-party services (e.g., Google Maps, YouTube). These providers set their own cookies; please review their policies.
				</p>
			</div>
		</li>
		<li class="size_md li_h2">
			<div>
				<h2>Changes</h2>
				<p>
					Updates to this Cookie Policy will be posted here; see the “Last updated” date above.
				</p>
			</div>
		</li>
		<li class="size_md li_h2">
			<div>
				<h2>Contact</h2>
				<a href="mailto:cookies@dumashipping.com">cookies@dumashipping.com</a>
			</div>
		</li>
	</ol>
</section>
<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>
@endsection