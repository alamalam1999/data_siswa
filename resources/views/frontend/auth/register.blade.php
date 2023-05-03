@extends('frontend.layouts.auth')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title'))

@section('content')

    <!--begin::Form-->
    <div class="d-flex flex-center flex-column flex-lg-row-fluid">
        <!--begin::Wrapper-->
        <div class="w-lg-600px p-10">
            <!--begin::Form-->
            {{ html()->form('POST', route('frontend.auth.register.post'))->class('form w-100')->open() }}
            <!--begin::Heading-->
            <div class="text-center mb-11">
                <!--begin::Title-->
                <h1 class="text-dark fw-bolder mb-3">Register User</h1>
                <!--end::Title-->
                <!--begin::Subtitle-->
                <div class="text-gray-500 fw-semibold fs-6">Your Account for School</div>
                <!--end::Subtitle=-->
            </div>
            <!--begin::Heading-->
            @include('includes.partials.messages')

            <div class="row mb-5">
                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        {{ html()->text('first_name')->class('form-control')->placeholder(__('validation.attributes.frontend.first_name'))->attribute('maxlength', 191)->required() }}
                        {{ html()->label(__('validation.attributes.frontend.first_name'))->for('first_name') }}
                    </div>
                    <!--col-->
                </div>
                <!--row-->

                <div class="col-12 col-md-6">
                    <div class="form-floating">
                        {{ html()->text('last_name')->class('form-control bg-transparent')->placeholder(__('validation.attributes.frontend.last_name'))->attribute('maxlength', 191)->required()->value('') }}
                        {{ html()->label(__('validation.attributes.frontend.last_name'))->for('last_name') }}
                    </div>
                    <!--form-group-->
                </div>
                <!--col-->
            </div>
            <!--row-->

            <div class="row mb-5">
                <div class="col">
                    <div class="form-floating">
                        {{ html()->number('phone')->class('form-control bg-transparent')->placeholder(__('validation.attributes.frontend.phone'))->required() }}
                        {{ html()->label(__('validation.attributes.frontend.phone'))->for('phone') }}
                    </div>
                    <!--form-group-->
                </div>
                <!--col-->
            </div>

            <div class="row mb-5">
                <div class="col">
                    <div class="form-floating">
                        {{ html()->email('email')->class('form-control bg-transparent')->placeholder(__('validation.attributes.frontend.email'))->attribute('maxlength', 191)->required() }}
                        {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}
                    </div>
                    <!--form-group-->
                </div>
                <!--col-->
            </div>
            <!--row-->

            <div class="row mb-5">
                <div class="col">
                    <div class="form-floating">
                        {{ html()->password('password')->class('form-control')->placeholder(__('validation.attributes.frontend.password'))->required()->value('') }}
                        {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}
                    </div>
                    <!--form-group-->
                </div>
                <!--col-->
            </div>
            <!--row-->

            <div class="row mb-5">
                <div class="col">
                    <div class="form-floating">
                        {{ html()->password('password_confirmation')->class('form-control')->placeholder(__('validation.attributes.frontend.password_confirmation'))->required() }}
                        {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}

                    </div>
                    <!--form-group-->
                </div>
                <!--col-->
            </div>
            <!--row-->

            @if (config('access.captcha.registration'))
                <div class="row">
                    <div class="col">
                        @captcha
                        {{ html()->hidden('captcha_status', 'true') }}
                    </div>
                    <!--col-->
                </div>
                <!--row-->
            @endif


            <div class="d-grid mb-10">

                <button type="submit" id="kt_sign_in_submit" class="btn btn-success">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Register</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
            </div>

            <!--row-->

        



            @if (config('access.captcha.login'))
                <div class="d-grid mb-10">
                    @captcha
                    {{ html()->hidden('captcha_status', 'true') }}
                </div>
                <!--row-->
            @endif

            <!--begin::Sign up-->
            <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                <a href="{{ route('frontend.auth.login') }}" class="link-primary">Sign In</a>
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
    @if (config('access.captcha.registration'))
        @captchaScripts
    @endif
@endpush
