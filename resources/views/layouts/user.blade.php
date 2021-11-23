<!DOCTYPE html>
<html lang="en">
@include('include.user.head')
<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
    <div id="loader"></div>
    @include('include.user.sidebar')
    <div class="content-wrapper">
        <div class="container-full">
            @yield('content')
        </div>
    </div>
</div>
@include('include.user.footer')
@stack('before-scripts')
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
@stack('after-scripts')
</body>
</html>


