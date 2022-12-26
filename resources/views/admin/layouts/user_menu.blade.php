<div class="app-navbar flex-shrink-0">
    <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="image-input image-input-outline" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" style="background-image: url('{{auth()->check() && auth()->user()->getFirstMedia('avatars') ? auth()->user()->getFirstMedia('avatars')->getFullUrl() : asset('assets/admin/media/avatars/300-1.jpg')}}')">
            <!--begin::Preview existing avatar-->
            <div class="image-input-wrapper w-55px h-55px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" style="background-image: url({{auth()->check() && auth()->user()->getFirstMedia('avatars') ? auth()->user()->getFirstMedia('avatars')->getFullUrl() : asset('assets/admin/media/svg/avatars/blank.svg')}})"></div>
            <!--end::Preview existing avatar-->
        </div>
        <!--begin::User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        <img alt="Logo" src="{{auth()->check() && auth()->user()->getFirstMedia('avatars') ? auth()->user()->getFirstMedia('avatars')->getFullUrl() : asset('assets/admin/media/svg/avatars/blank.svg')}}" />
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Username-->
                    <div class="d-flex flex-column align-items-center">
                        <div class="fw-bold d-flex fs-5">{{auth()->user()->name}}</div>
                        <span class="badge-light-primary fw-bold fs-8 px-2 py-1 text-center">{{auth()->user()->roles->first()->name}}</span>
                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{\auth()->user()->email}}</a>
                    </div>
                    <!--end::Username-->
                </div>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="{{route('admin.myProfile')}}" class="menu-link px-5">@lang('users.myProfile')</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-5 my-1">
                <a href="{{route('admin.users.edit', auth()->id())}}" class="menu-link px-5">@lang('users.editMyProfile')</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <!--begin::Menu item-->
            <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                <a href="#" class="menu-link px-5">
                <span class="menu-title position-relative">@lang('common.language')
                <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">@lang('common.lang.en')
                <img class="w-15px h-15px rounded-1 ms-2" src="{{checkLocale('en') ? asset('assets/admin/media/flags/united-states.svg') : asset('assets/admin/media/flags/saudi-arabia.svg')}}" alt="" /></span></span>
                </a>
                <!--begin::Menu sub-->
                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{route('admin.language', ['en'])}}" class="menu-link d-flex px-5 active">
                    <span class="symbol symbol-20px me-4">
                        <img class="rounded-1" src="{{asset('assets/admin/media/flags/united-states.svg')}}" alt="" />
                    </span>@lang('common.lang.en')</a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{route('admin.language', ['ar'])}}" class="menu-link d-flex px-5 active">
                    <span class="symbol symbol-20px me-4">
                        <img class="rounded-1" src="{{asset('assets/admin/media/flags/saudi-arabia.svg')}}" alt="" />
                    </span>@lang('common.lang.ar')</a>
                    </div>
                    <!--end::Menu item-->
                </div>
                <!--end::Menu sub-->
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <a href="javascript:void(0)" onclick="$(this).closest('form').submit()" class="btn menu-link px-5">
                        @lang('login.signOut')
                    </a>
                </form>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::User account menu-->
        <!--end::Menu wrapper-->
    </div>
</div>
