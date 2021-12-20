@extends('frontend.layouts.app')

@section('title', __('Login'))

@section('content')
    <div class="main-wrapper">
        <div class="page-content change-password-col register-col">
            <div class="list no-hairlines custom-form">
                <div class="back-btn"><a href="{{ route('frontend.index') }}" class="back link">
                        <img src="assets/images/left-arrow-big-black.svg" alt=""></a>
                </div>
                <div class="register-icon">
                    <img src="assets/images/register-top-img.png" alt="">
                </div>
                <div class="logo">
                    <a href="{{ route('frontend.index') }}"><img src="assets/images/logo.svg" alt="doccure"></a>
                </div>
                <div class="register-inner-col">
                    <div class="top-title">
                        <div>
                            <h3>Login</h3>
                        </div>
                    </div>
                    @include('includes.partials.messages')
                    {{ Form::open(['url' => route('frontend.auth.login'), 'method' => 'POST']) }}
                    <ul class="change-list">
                        <li class="item-content item-input">
                            <div class="item-col">
                                <div class="item-input-wrap">
                                    {{ Form::text('email',old('email'), ['placeholder' => 'Email']) }}
                                    <div class="item-input-icon"><img src="assets/images/email.svg" alt=""></div>
                                </div>
                            </div>
                        </li>
                        <li class="item-content item-input">
                            <div class="item-col">
                                <div class="item-input-wrap">
                                    {{ Form::password('password', ['placeholder' => 'Password']) }}
                                    <div class="item-input-icon"><img src="assets/images/lock-icon.svg" alt=""></div>
                                </div>
                            </div>
                        </li>
                        <li class="col-50 save-password">
                        </li>
                        <li class="col-50 forgot-password">
                            <a href="forgot-password.html">Forgot Password ?</a>
                        </li>
                        <li class="item-content item-input">
                            <div class="item-input-wrap submit-btn-col">
                                <button type="submit" class="btn btn-submit">Login Now</button>
                            </div>
                        </li>
                    </ul>
                    {{ Form::close() }}
                    <span class="login-back">Don't have an login ? <a href="register.html">Signup Now!</a></span>
                </div>
            </div>
        </div>
    </div>
@endsection
