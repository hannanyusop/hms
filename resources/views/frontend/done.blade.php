
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#3a57c4">
    <title>Doccure - PWA Mobile Template</title>

    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Doccure - PWA Mobile Template">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/icons/icon-152x152.png') }}">

    <meta name="description" content="Doccure - PWA Mobile Template">

    <meta name="theme-color" content="#2F3BA2" />

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/css/swiper.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/circle.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>
<body>
<div class="main-wrapper">
    <div class="page-content pt-0 pb-0">
        <div class="booking-success-col">
            <div class="back-btn">
                <a href="index.html" class="back link"><img src="{{ asset('assets/images/left-arrow-big.svg') }}" alt=""></a>
            </div>
            <div class="booking-middle">
                <div class="booking-middle-inner">
                    <span class="tick-icon"><img src="{{ asset('assets/images/check-circle-big.svg') }}" alt=""></span>
                    <div class="success-full-text">
                        <h3>Appointment booked Successfully!</h3>
                        <p>Appointment for <br><span>{{ $appointment->patient->name }}</span>.
                            <br> Your number is <span>{{ $appointment->qms_format }}</span></p>
                    </div>
                    <div class="view-btn-col"><a href="{{ route('frontend.index') }}" class="btn">Done</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>

<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/plugins/swiper/js/swiper.min.js') }}"></script>

<script src="{{ asset('assets/js/install.js') }}"></script>

<script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
