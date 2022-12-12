<!--begin::Menu wrapper-->
<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
    <!--begin::Menu-->
    <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
        <!--begin:Menu item-->
        <div class="menu-item here">
            <!--begin:Menu link-->
            <a class="menu-link active" href="{{route('admin.dashboard')}}">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">@lang('menu.dashboard')</span>
            </a>
            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->

        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                            <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">@lang('menu.users')</span>
                <span class="menu-arrow"></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{route('admin.users.index')}}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">@lang('users.allUsers')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end:Menu sub-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{route('admin.users.create')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                        <span class="menu-title">@lang('users.createUser')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end:Menu item-->
        </div>
        <!--end:Menu item-->

        <!--begin:Menu item-->
        <div data-kt-menu-trigger="click" class="menu-item here menu-accordion">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
                            <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">@lang('menu.roles')</span>
                <span class="menu-arrow"></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{route('admin.roles.index')}}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">@lang('roles.allRoles')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end:Menu sub-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion">
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{route('admin.roles.create')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                        <span class="menu-title">@lang('roles.createRole')</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end:Menu item-->
        </div>
        <!--end:Menu item-->

    </div>
    <!--end::Menu-->
</div>
<!--end::Menu wrapper-->
