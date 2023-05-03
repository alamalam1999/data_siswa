<li class="breadcrumb-menu">
    <div class="d-flex flex-column " data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
        <div class="text-white fw-bold d-flex align-items-center fs-5 text-end dropdown-toggle">@lang('menus.backend.access.users.main')</div>
        
    </div>

    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <a href="{{ route('admin.auth.user.index') }}" class="menu-link px-5">@lang('menus.backend.access.users.active')</a>
        </div>
        <!--end::Menu item-->
        <div class="separator my-2"></div>
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <a href="{{ route('admin.auth.user.create') }}" class="menu-link px-5">@lang('menus.backend.access.users.create')</a>
        </div>
        <!--end::Menu item-->

        
        <div class="separator my-2"></div>
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <a href="{{ route('admin.auth.user.deactivated') }}" class="menu-link px-5">@lang('menus.backend.access.users.deactivated')</a>
        </div>
        <!--end::Menu item-->

        
        <div class="separator my-2"></div>
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <a href="{{ route('admin.auth.user.deleted') }}" class="menu-link px-5">@lang('menus.backend.access.users.deleted')</a>
        </div>
        <!--end::Menu item-->
    </div>
</li>
