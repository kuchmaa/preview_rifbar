@extends('layouts.app')

@section('meta_title', 'PRIVACY POLICY | COOKIE POLICY | DUMA SHIPPING NYC')

@section('meta_description', 'Legal terms for Duma Shipping NYC shipping services. Read our privacy policy.')

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
		<h1 class="w-full tai_c">PRIVACY POLICY</h1>
		<p><em>Last updated: 24 May 2025</em></p>
		<ol>
			<li class="size_md li_h2">
				<div>
					<h2>Scope</h2>
					<p>
						This Privacy Policy explains how <strong>DUMA TRANSPORTATION INC. (“Duma Shipping”)</strong> collects, uses, stores and discloses personal information when you visit <strong>dumashipping.com</strong>, create an account, request a quote or use our Services.
					</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>Information We Collect</h2>
					<div style="overflow: auto; width: 100%;">
						<table>
							<thead>
								<tr>
									<th>Category</th>
									<th>Examples</th>
									<th>Legal basis (GDPR)</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th><strong>Identity & contact</strong></th>
									<td>Name, postal address, phone, email, government-issued ID (for customs)</td>
									<td>Contract performance</td>
								</tr>
								<tr>
									<th><strong>Shipment details</strong></th>
									<td>Contents, weight, dimensions, declared value, pickup/delivery addresses</td>
									<td>Contract performance</td>
								</tr>
								<tr>
									<th><strong>Payment data</strong></th>
									<td>Last four digits of card, Stripe transaction ID (processed by Stripe)</td>
									<td>Legitimate interest / contract performance</td>
								</tr>
								<tr>
									<th>Usage data</th>
									<td>IP address, browser, device ID, pages visited, referring URLs, timestamps</td>
									<td>Legitimate interest (analytics, security)</td>
								</tr>
								<tr>
									<th>Cookies</th>
									<td>See “Cookie Policy”</td>
									<td>Consent / legitimate interest</td>
								</tr>
							</tbody>
						</table>
					</div>
					<p>We do <strong>not</strong> knowingly collect data from children under 13.</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>How We Use Your Information</h2>
					<p>
						<ul>
							<li><span>Process and manage shipments, pickups and customs documentation</span></li>
							<li><span>Provide status updates, invoices and service messages</span></li>
							<li><span>Verify identity to prevent fraud</span></li>
							<li><span>Improve website performance and customer experience</span></li>
							<li><span>Comply with legal obligations (tax, sanctions screening)</span></li>
						</ul>
					</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>Sharing & Disclosure</h2>
					<p>
						<ul>
							<li><span><strong>Carriers and logistics partners</strong> to fulfil your shipment</span></li>
							<li><span><strong>Stripe</strong> and other <strong>payment processors</strong> for secure payment handling</span></li>
							<li><span><strong>IT vendors</strong> providing infrastructure, email or analytics services</span></li>
							<li><span><strong>Authorities</strong> when legally required (e.g., customs, law enforcement)</span></li>
						</ul>
					</p>
					<p>We never sell your personal information.</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>Storage & Security</h2>
					<p>Data is stored on servers located in the United States. We use industry-standard safeguards (encryption in transit, restricted access, regular backups). No method of transmission or storage is entirely secure; you acknowledge this risk.</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>Retention</h2>
					<p>
						We keep shipment records and associated personal data for <strong>7 years</strong> to meet accounting and regulatory requirements, then securely delete or anonymize them.
					</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2> Your Rights (GDPR / CCPA)</h2>
					<p>
						Depending on your jurisdiction, you may:
						<ul>
							<li><span>Access, correct or delete personal data</span></li>
							<li><span>Object to or restrict processing</span></li>
							<li><span>Receive a portable copy of data</span></li>
							<li><span>Withdraw consent at any time</span></li>
							<li><span>Lodge a complaint with a supervisory authority</span></li>
						</ul>
					</p>
					<p>
						Send requests to <strong>privacy@dumashipping.com</strong>. We will respond within 30 days.
					</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>International Transfers</h2>
					<p>If you reside outside the United States, your data will be transferred to and processed in the U.S. We rely on contractual clauses and other recognized safeguards.</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>Changes</h2>
					<p>Material changes will be posted on our site and, if we have your email, notified directly.</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>Contact</h2>
					<p class="flex col">
						<a href="mailto:privacy@dumashipping.com">privacy@dumashipping.com</a>
						<span>(Full postal address above)</span>
					</p>
				</div>
			</li>
		</ol>
	</section>
	<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>
@endsection