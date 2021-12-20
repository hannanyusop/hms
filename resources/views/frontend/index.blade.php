<!DOCTYPE html>
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }



    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
</style>

@extends('frontend.layouts.app')

@section('title', __('Login'))

@section('content')
    <div class="main-wrapper">

        <div class="top-right links">
            @auth
                @if ($logged_in_user->isUser())
                    <a href="{{ route('frontend.user.dashboard') }}">@lang('Dashboard')</a>
                @endif
            @else
                <a href="{{ route('frontend.auth.login') }}">@lang('Login')</a>
            @endauth
                <a href="{{ route('qms.screen') }}">@lang('QMS')</a>
        </div><!--top-right-->

        <div class="page-content change-password-col register-col">
            <div class="list no-hairlines custom-form" style="margin-top: 250px">
                <div class="register-inner-col">
                    @include('includes.partials.messages')
                    {{ Form::open(['url' => route('frontend.home.store'), 'method' => 'POST']) }}
                    <ul class="change-list">
                        <li class="item-content item-input">
                            <div class="item-col">
                                <div class="item-input-wrap">
                                    {{ Form::text('card_no',old('card_no'), ['placeholder' => 'Card Number', 'class' => 'text-uppercase']) }}
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="login-back font-weight-bold">Only registered customer has Card Number | Example:003</span>
                        </li>
                        <li class="item-content item-input">
                            <div class="item-input-wrap submit-btn-col">
                                <button type="submit" class="btn btn-submit">Get Number</button>
                            </div>
                        </li>
                    </ul>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

