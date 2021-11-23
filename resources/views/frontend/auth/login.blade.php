@extends('frontend.layouts.app')

@section('title', __('Login'))

@section('content')

    <div class="col-12">
        <div class="row justify-content-center g-0">
            <div class="col-lg-5 col-md-5 col-12">
                <div class="bg-white rounded10 shadow-lg">
                    <div class="content-top-agile p-20 pb-0">
                        <h2 class="text-primary">{{ env('APP_NAME') }}</h2>
                        <p class="mb-0">Sign in to continue.</p>
                    </div>
                    <div class="p-40">
                        <x-forms.post :action="route('frontend.auth.login')">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                    <input type="email" name="email" id="email" class="form-control ps-15 bg-transparent" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required autofocus autocomplete="email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                    <input type="password" name="password" id="password" class="form-control ps-15 bg-transparent" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="current-password" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="checkbox">
                                        <input type="checkbox" id="basic_checkbox_1" >
                                        <label for="basic_checkbox_1">Remember Me</label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <!-- /.col -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-danger mt-10">SIGN IN</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </x-forms.post>
                        <div class="text-center">
                            <p class="mt-15 mb-0">Forgot Password?
                                <x-utils.link :href="route('frontend.auth.password.request')" class="" :text="__('Recover Password')" />
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
