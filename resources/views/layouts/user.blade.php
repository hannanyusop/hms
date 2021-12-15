
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
    <link rel="stylesheet" href="{{ asset('assets/plugins/swiper/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/circle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="main-wrapper">
    <div class="side-menu" id="sidebar-menu">
        <div class="close-btn"><span class="material-icons">close</span></div>
        <ul>
            <li>
                <a class="" href="{{ route('frontend.user.dashboard') }}">
                    <span class="material-icons">dashboard</span>
                    Dashboard
                </a>
            </li>
            <li>
                <a class="" href="{{ route('appointment.index') }}">
                    <span class="material-icons">date_range</span>
                    Appointments
                </a>
            </li>
            <li>
                <a class="" href="{{ route('patient.index') }}">
                    <span class="material-icons">person</span>
                    My Patients
                </a>
            </li>
            <li>
                <a class="" href="schedule-timings.html">
                    <span class="material-icons">access_time</span>
                    Schedule Timings
                </a>
            </li>
            <li>
                <a class="" href="invoices.html">
                    <span class="material-icons">insert_drive_file</span>
                    Invoices
                </a>
            </li>
            <li>
                <a class="" href="{{ route('qms.screen') }}">
                    <span class="material-icons">pages</span>
                    QMS
                </a>
            </li>
            <li>
                <a class="" href="chat.html">
                    <span class="material-icons">message</span>
                    Message
                </a>
            </li>
            <li>
                <a class="" href="profile-settings.html">
                    <span class="material-icons">settings</span>
                    Profile Settings
                </a>
            </li>
            <li>
                <a class="" href="social-media.html">
                    <span class="material-icons">share</span>
                    Social Media
                </a>
            </li>
            <li>
                <a class="" href="change-password.html">
                    <span class="material-icons">lock_open</span>
                    Change Password
                </a>
            </li>
        </ul>
        <a class="sidebar-logout" href="{{ route('frontend.auth.logout') }}"><span><img src="{{ asset('assets/images/open-account-logout.svg') }}" alt=""></span>Logout</a>
    </div>
    <div class="navbar two-action no-hairline">
        <div class="navbar-inner d-flex align-items-center">
            <div class="left">
                <a href="#" class="link icon-only">
                    <i class="custom-hamburger">
                        <span><b></b></span>
                    </i>
                </a>
            </div>
            <div class="sliding custom-title">@yield('title')</div>
            <div class="right d-flex">
                <a href="notifications.html" class="link icon-only"><i class="material-icons">notifications</i></a>
                <a href="#" data-toggle="dropdown" aria-expanded="true" class="link"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right header_drop_icon">
                    <a href="doctor-profile.html" class="dropdown-item">My Profile</a>
                    <a href="profile-settings.html" class="dropdown-item">Settings</a>
                    <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content pt-0">
        <div class="container">

            <div class="search-tag">
                <div class="top-title">
                    <div class="left">
                        <div class="icon-col">
                            <img src="{{ asset('assets/images/calender-icon.svg') }}" alt="">
                        </div>
                        <div class="text-col">
                            <h5>@yield('module')</h5>
                            <span>@yield('title')</span>
                        </div>
                    </div>
                    <div class="right">
                        <div class="progress-col">
                            <div class="c100 p35 very-small">
                                <div class="progress-text">
                                    <div>
                                        <b>30</b>
                                        <sub>Mints</sub>
                                    </div>
                                </div>
                                <div class="slice">
                                    <div class="bar"></div>
                                    <div class="fill"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="m-4">
                @include('includes.partials.messages')
                @yield('content')
            </div>
        </div>
    </div>
</div>

@stack('before-scripts')
<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/swiper/js/swiper.min.js') }}"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
@stack('after-scripts')
</body>
</html>
