@extends('frontend.layouts.auth')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')



<!--begin::Form-->
<div class="d-flex flex-center flex-column flex-lg-row-fluid">
    <!--begin::Wrapper-->
    <div class="w-lg-500px p-10">
        <!--begin::Form-->
        {{ html()->form('POST', route('frontend.auth.login.post'))->class('form w-100')->open() }}
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">Your Account School</div>
            <!--end::Subtitle=-->
        </div>
        <!--begin::Heading-->
        @include('includes.partials.messages')
        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            {{ html()->email('email')
                                        ->class('form-control bg-transparent')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
            <!--end::Email-->
        </div>
        <!--end::Input group=-->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            {{ html()->password('password')
                                        ->class('form-control bg-transparent')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required() }}
            <!--end::Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>
            <!--begin::Link-->
            <a href="{{ route('frontend.auth.password.reset') }}" class="link-primary">@lang('labels.frontend.passwords.forgot_password')</a>
            <!--end::Link-->
        </div>
        <!--end::Wrapper-->
        @if(config('access.captcha.login'))
        <div class="d-grid mb-10">
            @captcha
            {{ html()->hidden('captcha_status', 'true') }}
        </div>
        <!--row-->
        @endif
        <!--begin::Submit button-->
        <div class="d-grid mb-10">

            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">Sign In</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </button>
        </div>
        <!--end::Submit button-->
        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
            <a href="{{ route('frontend.ppdb') }}" class="link-primary">Sign up</a>
        </div>
        <!--end::Sign up-->
        {{ html()->form()->close() }}
        <!--end::Form-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Form-->
<!--begin::Footer-->
<div class="d-flex flex-center flex-wrap px-5">
    <!--begin::Links-->
    <div class="d-flex fw-semibold text-primary fs-base d-none">
        <a href="#" class="px-5" target="_blank">Terms</a>
        <a href="#" class="px-5" target="_blank">Plans</a>
        <a href="#" class="px-5" target="_blank">Contact Us</a>
    </div>
    <!--end::Links-->
</div>
<!--end::Footer-->





@endsection

@push('after-scripts')
@if(config('access.captcha.login'))
@captchaScripts
@endif
@endpush