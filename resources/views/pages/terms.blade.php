@extends('layouts.app')


@section('meta_title', 'TERMS & CONDITION | DUMA SHIPPING NYC')

@section('meta_description', 'Legal terms for Duma Shipping NYC shipping services. Read our terms and conditions.')

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
		<h1 class="w-full tai_c">TERMS & CONDITIONS</h1>
		<p><em>Last updated: 24 May 2025</em></p>
		<ol>
			<li class="size_md li_h2">
				<div>
					<h2>Overview</h2>
					<p>These Terms & Conditions (“<strong>Terms</strong>”) govern every shipping, pickup and delivery service (“<strong>Services</strong>”) provided by <strong>DUMA TRANSPORTATION INC</strong>. (“<strong>Duma Shipping</strong>,” “<strong>we</strong>,” “<strong>our</strong>,” or “<strong>us</strong>”) to any customer (“<strong>Customer</strong>,” “<strong>you</strong>,” or “<strong>your</strong>”). By booking or using our Services, you agree to be bound by these Terms.</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>Pricing & Payment</h2>
					<ol>
						<li class="size_md li_h3">
							<div>
								<h3><strong>Minimum charge.</strong></h3>
								<p>The minimum price per shipment is <strong>US $150</strong>.</p>
							</div>
						</li>
						<li class="size_md li_h3">
							<div>
								<h3><strong>Payment processor.</strong></h3>
								<p> All payments are processed securely through <strong>Stripe</strong>; we do not store your card details.</p>	
							</div>
						</li>
						<li class="size_md li_h3">
							<div>
								<h3><strong>Carrier fee.</strong></h3>
								<p> Transportation by third-party carriers (e.g., ocean or air freight) is billed separately and is not included in our door-to-door rate.</p>
							</div>	
						</li>
						<li class="size_md li_h3">
							<div>
								<h3><strong>Oversized / heavy items.</strong></h3>
								<p> Any single piece that <strong>cannot be lifted by one person</strong> or <strong>weighs more than 70 lb</strong> requires you to provide a helper at both pickup and delivery locations.</p>
							</div>
						</li>
					</ol>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>
						Pickup & Delivery
					</h2>
					<ol>
						<li class="size_md li_h3">
							<div>
								<h3>
									<strong>Ground-level service.</strong>
								</h3>
								<p>
									Standard service is door-to-door at ground level.
								</p>
							</div>
						</li>
						<li class="size_md li_h3">
							<div>
								<h3>
									<strong>Local rates.</strong>
								</h3>
								<ul>
									<li>
										<span><strong>Brooklyn, NY:</strong> free pickup/delivery</span>
									</li>
									<li><span><strong>New York City (other boroughs):</strong> US $100</span></li>
									<li><span><strong>More than 20 miles from Brooklyn:</strong> US $150 + tolls</span></li>
									<li><span><strong>Outside the above radius:</strong> price quoted individually</span></li>
								</ul>
							</div>
						</li>
						<li class="size_md li_h3">
							<div>
								<h3>
									<strong>Appointment windows.</strong>
								</h3>
								<p>
									You must ensure someone is present to release or receive the goods during the confirmed time slot; redelivery may incur additional charges.
								</p>
							</div>
						</li>
					</ol>
				</div>
			</li>
			<li class="size_md li_h2">
				<div >
					<h2>Prohibited & Restricted Goods</h2>
					<p>We do <strong>not</strong> transport cigarettes, alcohol, drugs, weapons, live plants or any item whose carriage is illegal under applicable law. Shipping any prohibited goods voids liability coverage and may result in refusal, disposal, or reporting to authorities.</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>Liability</h2>
					<ol>
						<li class="size_md li_h3">
							<h3><strong>Loss or damage.</strong></h3>
							<p>Our liability is limited to the lesser of the declared value or <strong>US $100 per item</strong>.</p>
						</li>
						<li class="size_md li_h3">
							<h3><strong>Consequential losses.</strong></h3>
							<p>We are not liable for indirect or consequential damages, including lost profits or business interruption.</p>
						</li>
						<li class="size_md li_h3">
							<h3><strong>Force majeure.</strong></h3>
							<p> We are not responsible for delays or failures caused by events beyond our reasonable control (e.g., severe weather, strikes, governmental actions).</p>
						</li>
					</ol>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>Claims</h2>
					<p>Claims for loss, damage, or overcharge must be submitted in writing within <strong>7 days after delivery</strong> (or expected delivery). Supporting photos and documentation are required.</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>Governing Law & Dispute Resolution</h2>
					<p>These Terms are governed by the laws of the <strong>State of New York</strong>. Any dispute shall be resolved in the state or federal courts located in <strong>Kings County, NY</strong>, unless we mutually agree to arbitration.</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>Changes to Terms</h2>
					<p>We may update these Terms at any time. Changes take effect when posted on <strong>dumashipping.com</strong>. Continuing to use the Services after an update constitutes acceptance.</p>
				</div>
			</li>
			<li class="size_md li_h2">
				<div>
					<h2>Contact</h2>
					<p class="flex col">
						<span>DUMA TRANSPORTATION INC.</span>
						<span>2824 86 Street, Fl 1, Brooklyn, NY 11223</span>
						<span>Office: 2870 86th Street, Brooklyn, NY 11223</span>
						<span><a href="tel:+1 (631) 431-4242">Phone: +1 (631) 431-4242</a></span>
						<span><a href="mailto:info@dumashipping.com">Email: info@dumashipping.com</a></span>
					</p>
				</div>
			</li>
		</ol>
	</section>
	<x-footer contactsText='Have questions or ready to ship? Contact Duma Shipping today for hassle-free NYC logistics solutions!'/>
@endsection