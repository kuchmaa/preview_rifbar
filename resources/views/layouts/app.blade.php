<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	{{-- Stripe ключ (если нужен в JS) --}}
	<meta name="stripeKey" content="{{ config('services.stripe.key') }}">
	{{-- User context for chat --}}
	@auth
		<meta name="user-id" content="{{ auth()->id() }}">
	@endauth

	{{-- Всегда индексируем --}}
	<meta name="robots" content="index, follow">

	{{-- Canonical --}}
	<link rel="canonical" href="https://www.dumashipping.com/" />

	{{-- Основные мета --}}
	<title>@yield('meta_title', 'Duma Shipping')</title>
	<meta name="description" content="@yield('meta_description', '')">

    {{-- <link rel="preconnect" href="https://cdnjs.cloudflare.com"> --}}

	{{-- Open Graph --}}
	<meta property="og:title" content="@yield('meta_title', 'Duma Shipping')" />
	<meta property="og:description" content="@yield('meta_description', '')" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://www.dumashipping.com/" />
	<meta property="og:image" content="https://www.dumashipping.com/imgs/logo.png" />

	{{-- Open Graph / Facebook --}}
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://www.dumashipping.com/" />
	<meta property="og:title" content="@yield('meta_title', 'Duma Shipping')" />
	<meta property="og:description" content="@yield('meta_description', '')" />
	<meta property="og:image" content="https://www.dumashipping.com/imgs/logo.png" />

	{{-- Twitter Card
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="@yield('meta_title', 'Duma Shipping')" />
	<meta name="twitter:description" content="@yield('meta_description', '')" />
	<meta name="twitter:image" content="{{ asset('imgs/og-image.jpg') }}" /> --}}

    <script type="application/ld+json">
    {
    "@@context": "https://schema.org",
    "@@type": "LocalBusiness",
    "name": "Duma Shipping",
    "url": "https://www.dumashipping.com/",
    "image": "https://www.dumashipping.com/imgs/logo.png",
    "telephone": "+1-631-431-4242",
    "areaServed": [
        {"@@type":"City","name":"New York City"},
        {"@@type":"AdministrativeArea","name":"New York"},
        {"@@type":"AdministrativeArea","name":"New Jersey"},
        {"@@type":"AdministrativeArea","name":"Florida"}
    ],
    "servesCuisine": "logistics",
    "description": "NYC freight shipping, trucking in NYC and New York package delivery with door-to-door service across the East Coast.",
    "sameAs": ["https://www.facebook.com/share/1LGLtdT4Pp/"],
    "makesOffer": [
        {
        "@@type": "Service",
        "name": "NYC Freight Shipping",
        "areaServed": {"@@type":"City","name":"New York City"},
        "serviceType": "freight shipping new york, nyc freight"
        },
        {
        "@@type": "Service",
        "name": "Package Delivery NYC",
        "serviceType": "package delivery new york, nyc package delivery service"
        },
        {
        "@@type": "Service",
        "name": "Trucking in NYC",
        "serviceType": "local trucking new york city"
        }
    ]
    }
    </script>

	{{-- Предзагрузка шрифтов --}}
	<link rel="preload" href="{{ asset('fonts/centurygothic.ttf') }}" as="font" type="font/ttf" crossorigin>
	<link rel="preload" href="{{ asset('fonts/FranklinGothicHeavy.ttf') }}" as="font" type="font/ttf" crossorigin>
	<link rel="preload" href="{{ asset('fonts/centurygothic_bold.ttf') }}" as="font" type="font/ttf" crossorigin>

	{{-- Стили --}}
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/media/laptop.css') }}" rel="stylesheet" media="(max-width:1660px)">
	<link href="{{ asset('css/media/tablet.css') }}" rel="stylesheet" media="(max-width:1100px)">
	<link href="{{ asset('css/media/mobile.css') }}" rel="stylesheet" media="(max-width:860px)">
    <link rel="stylesheet" href="{{ asset('css/components/chat.css') }}">


	<link rel="shortcut icon" href="{{ asset('svg/logo-black.svg') }}" type="image/svg+xml">

	@stack('styles')
	@include('components.cookie-consent-style')

	{{-- Google Analytics --}}
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-6KRHZJNSJK"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'G-6KRHZJNSJK');
	</script>
	<!-- Meta Pixel Code -->
<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '1644208666341977');
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=1644208666341977&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Meta Pixel Code -->

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-N8P9WQCR');</script>
	<!-- End Google Tag Manager -->



</head>

<body class="flex-center col">
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8P9WQCR"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	{{-- Покрытие и меню --}}
	<div id="cover"></div>
	@include('components.menu')
	@include('components.header')

	{{-- Опциональный хедер страницы --}}
	@isset($header)
	<header class="bg-white shadow">
		<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
			{{ $header }}
		</div>
	</header>
	@endisset

	{{-- Основной контент --}}
	@yield('content')

	{{-- Основные скрипты --}}
	@vite(['resources/js/main.js', 'resources/js/cookie-consent.js'])

	@stack('scripts')
	@yield('scripts')

	{{-- @include('components.footer') --}}
	{{--  --}}
	@include('components.cookie-consent')

	{{-- Working Chat Widget --}}
	@include('components.chat.working-widget')

</body>

</html>
