@include('templates.pages.dashboard.includes.header')

<meta name="csrf-token" content="{{ csrf_token() }}" />

@yield('content')


@include('templates.pages.dashboard.includes.footer')