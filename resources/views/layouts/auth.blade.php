<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <meta name="title" content="Volt Premium Bootstrap Dashboard - Sign in page">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta name="author" content="Themesberg">
        <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
        <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard">
        <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard"><!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ env('APP_URL') }}">
        <meta property="og:title" content="{{ env('APP_NAME') }}">
        <meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
        <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg"><!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ env('APP_URL') }}">
        <meta property="twitter:title" content="{{ env('APP_NAME') }}">
        <meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
        <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg"><!-- Favicon -->
        <link rel="apple-touch-icon" sizes="120x120" href="../../assets/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
        <link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <!-- Sweet Alert -->
        <link type="text/css" href="{{ asset('public/assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet"><!-- Notyf -->
        <link type="text/css" href="{{ asset('public/assets/vendor/notyf/notyf.min.css') }}" rel="stylesheet"><!-- Full Calendar  -->
        <link type="text/css" href="{{ asset('public/assets/vendor/fullcalendar/main.min.css') }}" rel="stylesheet"><!-- Apex Charts -->
        <link type="text/css" href="{{ asset('public/assets/vendor/apexcharts/dist/apexcharts.css') }}" rel="stylesheet"><!-- Dropzone -->
        <link type="text/css" href="{{ asset('public/assets/vendor/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet"><!-- Choices  -->
        <link type="text/css" href="{{ asset('public/assets/vendor/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet"><!-- Leaflet JS -->
        <link type="text/css" href="{{ asset('public/assets/vendor/leaflet/dist/leaflet.css') }}" rel="stylesheet"><!-- Volt CSS -->
        <link type="text/css" href="{{ asset('public/assets/css/volt.css') }}" rel="stylesheet">
    </head>
    <body>
        <main>
            <!-- Section -->
            <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
                <div class="container">
                <p class="text-center">                    
                    <div class="row justify-content-center form-bg-image" data-background="{{ asset('public/images/illustrations/signin.svg') }}">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                                <div class="text-center text-md-center mb-4 mt-md-0">
                                    <img src="{{ asset('public/images/logo.webp') }}" alt="LOGO" width="50" height="50" class="img-circle img-fluid">
                                    <h3 class="mb-0 h3">{{ env('APP_NAME') }}</h3>
                                </div>
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <script src="{{ asset('public/assets/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/nouislider/distribute/nouislider.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/countup.js/dist/countUp.umd.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/simple-datatables/dist/umd/simple-datatables.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
        <script src="{{ asset('public/assets/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/fullcalendar/main.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/notyf/notyf.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/leaflet/dist/leaflet.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/svg-pan-zoom/dist/svg-pan-zoom.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/svgmap/dist/svgMap.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/simplebar/dist/simplebar.min.js') }}"></script>
        <script src="{{ asset('public/assets/vendor/sortablejs/Sortable.min.js') }}"></script>
        <script async defer="defer" src="https://buttons.github.io/buttons.js"></script>
        <script src="{{ asset('public/assets/js/volt.js') }}"></script>
    </body>
</html>
