<!--begin::Menu wrapper-->
<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
    <!--begin::Menu-->
    <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
        <!--begin:Menu item-->
        @can('dashboard')
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link  @if(checkActiveRouteName(['admin.dashboard'])) active @endif" href="{{route('admin.dashboard')}}">
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
        @endcan
        <!--end:Menu item-->
        <!--begin:Menu item-->
        @canany(['force-list-users', 'list-users', 'create-user'])
            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion  @if(checkActiveRouteName(['admin.users.index', 'admin.users.create'])) here hover show @endif">
                <!--begin:Menu link-->
                <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                    <i class="fa-solid fa-address-book  fs-4"></i>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">@lang('menu.users')</span>
                <span class="menu-arrow"></span>
            </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                @canany(['force-list-users', 'list-users'])
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.users.index'])) active @endif" href="{{route('admin.users.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('users.allUsers')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcanany
                <!--end:Menu sub-->
                <!--begin:Menu sub-->
                @can('create-user')
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.users.create'])) active @endif" href="{{route('admin.users.create')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('users.createUser')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcan
                <!--end:Menu sub-->
            </div>
        @endcanany
        <!--end:Menu item-->

        <!--begin:Menu item-->
        @canany(['force-list-roles', 'list-roles', 'create-role'])
            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion @if(checkActiveRouteName(['admin.roles.index', 'admin.roles.create'])) here hover show @endif">
                <!--begin:Menu link-->
                <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                    <i class="fa-solid fa-fingerprint fs-4"></i>
                    <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">@lang('menu.roles')</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                @canany(['force-list-roles', 'list-roles'])
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.roles.index'])) active @endif" href="{{route('admin.roles.index')}}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                                <span class="menu-title">@lang('roles.allRoles')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcanany
                <!--end:Menu sub-->
                <!--begin:Menu sub-->
                @can('create-role')
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.roles.create'])) active @endif" href="{{route('admin.roles.create')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">@lang('roles.createRole')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcan
                <!--end:Menu item-->
            </div>
        @endcanany
        <!--end:Menu item-->
        <!--begin:Menu item-->
        @canany(['list-services', 'create-service'])
            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion @if(checkActiveRouteName(['admin.services.index', 'admin.services.create'])) here hover show @endif">
                <!--begin:Menu link-->
                <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                    <i class="fa-solid fa-fingerprint fs-4"></i>
                    <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">@lang('menu.services')</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                @canany(['force-list-services', 'list-services'])
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.services.index'])) active @endif" href="{{route('admin.services.index')}}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                                <span class="menu-title">@lang('services.allServices')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcanany
                <!--end:Menu sub-->
                <!--begin:Menu sub-->
                @can('create-service')
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.services.create'])) active @endif" href="{{route('admin.services.create')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">@lang('services.createService')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcan
                <!--end:Menu item-->
            </div>
        @endcanany
        <!--end:Menu item-->
        <!--begin:Menu item-->
        @canany(['list-orders', 'create-order'])
            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion @if(checkActiveRouteName(['admin.orders.index', 'admin.orders.create'])) here hover show @endif">
                <!--begin:Menu link-->
                <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                    <i class="fa-solid fa-fingerprint fs-4"></i>
                    <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">@lang('menu.orders')</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                @canany(['force-list-orders', 'list-orders'])
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.orders.index'])) active @endif" href="{{route('admin.orders.index')}}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                                <span class="menu-title">@lang('orders.allOrders')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcanany
                <!--end:Menu sub-->
                <!--begin:Menu sub-->
                @can('create-order')
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.orders.create'])) active @endif" href="{{route('admin.orders.create')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                                <span class="menu-title">@lang('orders.createOrder')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcan
                <!--end:Menu item-->
            </div>
        @endcanany
        <!--end:Menu item-->
        <!--begin:Menu item-->
        @canany(['list-staff', 'create-staff'])
            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion @if(checkActiveRouteName(['admin.staff.index', 'admin.staff.create'])) here hover show @endif">
                <!--begin:Menu link-->
                <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                    <i class="fa-solid fa-fingerprint fs-4"></i>
                    <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">@lang('menu.staff')</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                @canany(['list-staff'])
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.staff.index'])) active @endif" href="{{route('admin.staff.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('staff.allStaff')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcanany
                <!--end:Menu sub-->
                <!--begin:Menu sub-->
                @can('create-staff')
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.staff.create'])) active @endif" href="{{route('admin.staff.create')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('staff.createStaff')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcan
                <!--end:Menu item-->
            </div>
        @endcanany
        <!--end:Menu item-->
        <!--begin:Menu item-->
        @canany(['list-clients', 'create-client'])
            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion @if(checkActiveRouteName(['admin.clients.index', 'admin.clients.create'])) here hover show @endif">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <i class="fa-solid fa-fingerprint fs-4"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">@lang('menu.clients')</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                @canany(['list-clients'])
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.clients.index'])) active @endif" href="{{route('admin.clients.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('clients.allClients')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcanany
                <!--end:Menu sub-->
                <!--begin:Menu sub-->
                @can('create-client')
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.clients.create'])) active @endif" href="{{route('admin.clients.create')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('clients.createClient')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcan
                <!--end:Menu item-->
            </div>
        @endcanany
        <!--end:Menu item-->
        <!--begin:Menu item-->
        @canany(['list-articles', 'create-article'])
            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion @if(checkActiveRouteName(['admin.articles.index', 'admin.articles.create'])) here hover show @endif">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <i class="fa-solid fa-fingerprint fs-4"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">@lang('menu.articles')</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                @canany(['list-articles'])
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.articles.index'])) active @endif" href="{{route('admin.articles.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('articles.allArticles')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcanany
                <!--end:Menu sub-->
                <!--begin:Menu sub-->
                @can('create-article')
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.articles.create'])) active @endif" href="{{route('admin.articles.create')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('articles.createArticle')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcan
                <!--end:Menu item-->
            </div>
        @endcanany
        <!--end:Menu item-->
        <!--begin:Menu item-->
        @canany(['list-customers', 'create-customer'])
            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion @if(checkActiveRouteName(['admin.customers.index', 'admin.customers.create'])) here hover show @endif">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                        <i class="fa-solid fa-fingerprint fs-4"></i>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">@lang('menu.customerReviews')</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                @canany(['list-customers'])
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.customers.index'])) active @endif" href="{{route('admin.customers.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('customers.allCustomerReviews')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcanany
                <!--end:Menu sub-->
                <!--begin:Menu sub-->
                @can('create-customer')
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.customers.create'])) active @endif" href="{{route('admin.customers.create')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('customers.createCustomerReview')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcan
                <!--end:Menu item-->
            </div>
        @endcanany
        <!--end:Menu item-->
        <!--begin:Menu item-->
        @canany(['about-us-setting', 'logo-setting', 'links-setting'])
            <div data-kt-menu-trigger="click" class="menu-item here menu-accordion @if(checkActiveRouteName(['admin.settings', 'admin.settings'], 'key', request('key'))) here hover show @endif">
                <!--begin:Menu link-->
                <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                    <i class="fa-solid fa-fingerprint fs-4"></i>
                    <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">@lang('menu.settings')</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                @can(['about-us-setting'])
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.settings'], 'key', 'about_us')) active @endif" href="{{route('admin.settings', ['key' => 'about_us'])}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('settings.aboutUs')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcan
                @can(['logo-setting'])
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.settings'], 'key', 'logo')) active @endif" href="{{route('admin.settings', ['key' => 'logo'])}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('settings.logo')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcan
                @can(['links-setting'])
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link @if(checkActiveRouteName(['admin.settings'], 'key', 'links')) active @endif" href="{{route('admin.settings', ['key' => 'links'])}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">@lang('settings.links')</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                @endcan
                <!--end:Menu sub-->
            </div>
        @endcanany
        <!--end:Menu item-->
    </div>
    <!--end::Menu-->
</div>
<!--end::Menu wrapper-->





