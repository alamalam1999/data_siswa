@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard'))


@section('content')


    <div class="row justify-content-center align-items-center mb-3">
        <div class="col col-sm-10 align-self-center">
            <div class="card">
                <div class="card-header border-bottom-1">
                    <h3 class="card-title text-gray-800 fw-bold">@lang('navs.frontend.user.account')</h3>
                </div>

                <div class="card-body">

                    <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_user_1">@lang('navs.frontend.user.profile')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_user_2">@lang('labels.frontend.user.profile.update_information')</a>
                        </li>
                        @if ($logged_in_user->canChangePassword())
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_user_3">@lang('navs.frontend.user.change_password')</a>
                            </li>
                        @endif

                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_tab_user_1" role="tabpanel">
                            @include('frontend.user.account.tabs.profile')
                        </div>
                        <div class="tab-pane fade" id="kt_tab_user_2" role="tabpanel">
                            @include('frontend.user.account.tabs.edit')
                        </div>
                        @if ($logged_in_user->canChangePassword())
                            <div class="tab-pane fade" id="kt_tab_user_3" role="tabpanel">
                                @include('frontend.user.account.tabs.change-password')
                            </div>
                        @endif

                    </div>

                    <!--tab panel-->
                </div>
                <!--card body-->
            </div><!-- card -->
        </div><!-- col-xs-12 -->
    </div><!-- row -->
@endsection
