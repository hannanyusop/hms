
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#3a57c4">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>

    <link rel="manifest" href="{{ asset('assets/manifest.json') }}">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="{{ appName() }} | @yield('title')">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/icons/icon-152x152.png') }}">
    <meta name="description" content="{{ appName() }} | @yield('title')">
    <meta name="theme-color" content="#2F3BA2" />
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/circle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="main-wrapper">

    <div class="page-content pt-0">
        <div class="container">
            <a class="btn btn-outline-secondary btn-rounded" href="{{ route('frontend.index') }}"><i class="fa fa-power-off"></i> </a>
            <div class="m-4">
                @yield('content')
            </div>
        </div>
    </div>
</div>

@stack('before-scripts')
<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
@stack('after-scripts')
</body>
</html>
