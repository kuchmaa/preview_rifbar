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
		<h1 class="w-full tai_c">Prohibited &amp; Restricted Items Policy (EN)</h1>
		<p><em>Last updated: {{ now()->format('d F Y') }}</em></p>

		<h2>Company</h2>
		<p><strong>Duma Shipping</strong></p>

		<h2>Purpose</h2>
		<p>Protect customers and drivers and comply with U.S. federal, state, local, and applicable international laws.</p>

		<h2>Scope</h2>
		<p>All Duma Shipping pickups, deliveries, and handling.</p>

		<h2>1) Prohibited Items</h2>
		<p>We do not accept and may seize/report to authorities if discovered:</p>
		<ol>
			<li>Weapons &amp; components: firearms, ammunition, cases/powder, magazines, suppressors, parts/“80%/ghost gun” frames, stun guns/tasers, pepper spray, combat/automatic knives, swords, realistic replicas/props.</li>
			<li>Explosives &amp; pyrotechnics: fireworks, detonators, signal flares, primers, etc.</li>
			<li>Drugs &amp; controlled substances: any illegal narcotics; medical marijuana, THC/cannabis/derivatives/edibles; CBD vapes/oils; drug paraphernalia.</li>
			<li>Hazardous Materials (HazMat) Classes 1–9:
				<ul>
					<li>gases and cylinders (propane, butane, oxygen),</li>
					<li>flammable liquids/solids (solvents, gasoline, paints),</li>
					<li>oxidizers/peroxides,</li>
					<li>toxic/poisonous substances, pesticides,</li>
					<li>radioactive materials,</li>
					<li>corrosives (acids/alkalis),</li>
					<li>other dangerous goods and aerosols.</li>
				</ul>
			</li>
			<li>Loose lithium batteries: standalone Li-ion/Li-metal cells and power banks (not installed in equipment).</li>
			<li>Biological/medical materials: blood, specimens, bio-waste, vaccines, Rx-only medical devices, prescription medications.</li>
			<li>Live beings &amp; biomaterials: live animals, insects, live plants/soil; human remains/ashes.</li>
			<li>Alcohol, tobacco, nicotine, vapes: any nicotine/tobacco products, e-cigs and liquids; alcoholic beverages.</li>
			<li>Cash &amp; bearer-value items: cash, coins/bullion, gemstones and jewelry, bearer instruments, high-value gift cards.</li>
			<li>Illegal/forbidden goods: stolen property, counterfeit goods, piracy/DRM-circumvention devices, illegal pornographic materials, sanctioned/export-controlled items.</li>
			<li>Strong magnets/magnetized cargo that may damage equipment/other parcels.</li>
		</ol>

		<h2>2) Restricted — accepted only with prior approval</h2>
		<ul>
			<li>Electronics with lithium batteries installed (laptops/phones): device must be powered off, protected from accidental activation, and properly packaged.</li>
			<li>Cosmetics/household chemicals/aerosols in small volumes — only if non-HazMat and correctly packed.</li>
			<li>Food items: factory-sealed, shelf-stable products with no temperature control required. Anything perishable/chilled/frozen — not accepted.</li>
		</ul>

		<h2>3) Right to inspect &amp; refuse</h2>
		<p>We may refuse carriage, require re-packaging, inspect shipments (with the sender present, or without in case of risk), hold freight in transit, dispose of dangerous items, and/or turn them over to authorities.</p>

		<h2>4) Shipper responsibility</h2>
		<p>The shipper certifies lawful contents, accurate declarations, and compliant packing/labeling. Hidden prohibited goods may incur fines, holds, confiscation, and recovery of all costs (including delays, disposal, legal fees). Carrier liability/insurance does not apply to prohibited or unapproved items.</p>

		<h2>5) Violations</h2>
		<p>If a violation is found: transport will be stopped, items may be seized, law enforcement notified, shipper account blocked, and costs recovered.</p>

		<h2>6) Updates &amp; contact</h2>
		<p>Policy may be updated without prior notice.<br>Questions and restricted-item approvals: <a href="mailto:support@dumashipping.com">info@dumashipping.com</a>.</p>
	</section>
	<x-footer contactsText='Have questions? Contact Duma Shipping for clarification on prohibited & restricted items.'/>
@endsection
