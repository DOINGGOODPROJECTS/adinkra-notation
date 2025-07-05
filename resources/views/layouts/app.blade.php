<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ADINKRA NOTATION') }}</title>

        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <meta name="title" content="{{ env('APP_NAME') }}">
        <meta name="author" content="ADINKRA FELLOWSHIP">
        <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
        <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard">
        <link rel="canonical" href="{{ env('APP_URL') }}">
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ env('APP_URL') }}">
        <meta property="og:title" content="{{ env('APP_NAME') }}">
        <meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
        <meta property="og:image" content="{{ asset('images/logo.webp') }}">
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ env('APP_URL') }}">
        <meta property="twitter:title" content="{{ env('APP_NAME') }}">
        <meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
        <meta property="twitter:image" content="{{ asset('images/logo.webp') }}">
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" sizes="32x32" href="{{ asset('images/favicon.ico') }}">
        <link rel="icon" sizes="16x16" href="{{ asset('images/favicon.ico') }}">
        <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
        <link rel="mask-icon" href="{{ asset('images/favicon.ico') }}" color="#ffffff">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">

        <link type="text/css" href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/vendor/notyf/notyf.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/vendor/fullcalendar/main.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/vendor/apexcharts/dist/apexcharts.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/vendor/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet"><!-- Leaflet JS -->
        <link type="text/css" href="{{ asset('assets/vendor/leaflet/dist/leaflet.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/css/volt.css') }}" rel="stylesheet">
        @stack('links')
    </head>
    <body>
        <x-navbar></x-navbar>
        <x-sidebar-menu></x-sidebar-menu>
        <main class="content">
            <x-navbar-top></x-navbar-top>
            {{ $slot }}

            <x-footer></x-footer>
        </main>

        <script src="{{ asset('assets/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script><!-- Vendor JS -->
        <script src="{{ asset('assets/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script><!-- Slider -->
        <script src="{{ asset('assets/vendor/nouislider/distribute/nouislider.min.js') }}"></script><!-- Smooth scroll -->
        <script src="{{ asset('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script><!-- Count up -->
        <script src="{{ asset('assets/vendor/countup.js/dist/countUp.umd.js') }}"></script><!-- Apex Charts -->
        <script src="{{ asset('assets/vendor/apexcharts/dist/apexcharts.min.js') }}"></script><!-- Datepicker -->
        <script src="{{ asset('assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script><!-- DataTables -->
        <script src="{{ asset('assets/vendor/simple-datatables/dist/umd/simple-datatables.js') }}"></script><!-- Sweet Alerts 2 -->
        <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script><!-- Moment JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
        <!-- Vanilla JS Datepicker -->
        <script src="{{ asset('assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script><!-- Full Calendar -->
        <script src="{{ asset('assets/vendor/fullcalendar/main.min.js') }}"></script><!-- Dropzone -->
        <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script><!-- Choices.js -->
        <script src="{{ asset('assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script><!-- Notyf -->
        <script src="{{ asset('assets/vendor/notyf/notyf.min.js') }}"></script><!-- Mapbox & Leaflet.js -->
        <script src="{{ asset('assets/vendor/leaflet/dist/leaflet.js') }}"></script><!-- SVG Map -->
        <script src="{{ asset('assets/vendor/svg-pan-zoom/dist/svg-pan-zoom.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/svgmap/dist/svgMap.min.js') }}"></script><!-- Simplebar -->
        <script src="{{ asset('assets/vendor/simplebar/dist/simplebar.min.js') }}"></script><!-- Sortable Js -->
        <script src="{{ asset('assets/vendor/sortablejs/Sortable.min.js') }}"></script><!-- Github buttons -->
        <script async defer="defer" src="https://buttons.github.io/buttons.js"></script><!-- Volt JS -->
        <script src="{{ asset('assets/js/volt.js') }}"></script>
        @stack('scripts')
    </body>
</html>
