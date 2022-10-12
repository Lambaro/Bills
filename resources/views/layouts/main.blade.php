<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bills') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="nav-fixed">
    <!-- Navbar -->
    @include('layouts.partials.nav')
    <!-- / Navbar -->
    <div id="layoutSidenav">
        <!-- Sidebar -->
        @include('layouts.partials.sidebar')
        <!-- / Sidebar -->
        <div id="layoutSidenav_content">
            <main class="container-fluid p-4">
                @yield('content')
            </main>
            <!-- Footer -->
            @include('layouts.partials.footer')
            <!--  Footer -->
        </div>
    </div>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
<!--Scripts-->
@yield('page-js-script')
</html>
