<nav id="header-nav" class="flex row">
    <a class="size_sl {{ Request::is('services.index') ? 'light-orange' : ''}}" href="{{ route('services.index') }}"><strong>Services</strong></a>
    <a class="size_sl {{ Request::is('about') ? 'light-orange' : ''}}" href="{{ route('about') }}"><strong>About Us</strong></a>
    <a class="size_sl {{ Request::is('contacts') ? 'light-orange' : ''}}" href="{{ route('contacts') }}"><strong>Contacts</strong></a>
    <a class="size_sl {{ Request::is('tracking') ? 'light-orange' : ''}}" href="{{ route('tracking') }}"><strong>Tracking</strong></a>
    <a class="size_sl {{ Request::is('calculator') ? 'light-orange' : ''}}" href="{{ route('calculator') }}"><strong>Calculator</strong></a>
</nav>
