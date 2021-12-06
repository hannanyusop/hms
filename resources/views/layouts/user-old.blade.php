<!DOCTYPE html>
<html lang="en">
@include('includes.user.head')
<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

<div class="wrapper">
    <div id="loader"></div>
    @include('includes.user.sidebar')
    <div class="content-wrapper">
        <div class="container-full">
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h4 class="page-title"> @yield('title')</h4>
                    </div>
                </div>
            </div>
            <section class="content">
                @include('includes.partials.messages')
                @yield('content')
            </section>
        </div>
    </div>
</div>
@include('includes.user.footer')
@stack('before-scripts')
    <script src="{{ asset('assets2/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets2/js/pages/chat-popup.js') }}"></script>
    <script src="{{ asset('assets2/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets2/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets2/js/template.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            "use strict";
            $('#dtable').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        });
    </script>
@stack('after-scripts')
</body>
</html>


