<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
    @include('website.layouts.head')
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::App-->
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
{{--				<div id="kt_app_header" class="app-header">--}}
{{--					<!--begin::Header container-->--}}
{{--					<div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">--}}
{{--                        @include('website.layouts.mobile_header')--}}
{{--						<!--begin::Header wrapper-->--}}
{{--                        @include('website.layouts.header')--}}
{{--						<!--end::Header wrapper-->--}}
{{--					</div>--}}
{{--					<!--end::Header container-->--}}
{{--				</div>--}}
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    <!--begin::Sidebar-->
{{--                    <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">--}}
{{--                        <!--begin::Logo-->--}}
{{--                        @include('website.layouts.logo')--}}
{{--                        <!--end::Logo-->--}}
{{--                        <!--begin::sidebar menu-->--}}
{{--                        <div class="app-sidebar-menu overflow-hidden flex-column-fluid">--}}
{{--                            @include('website.layouts.aside')--}}
{{--                        </div>--}}
{{--                        <!--end::sidebar menu-->--}}
{{--                    </div>--}}
                    <!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="app-container container-xxl">
                                    <!--begin::Container-->
                                    @yield('content')
                                    <!--end::Container-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
{{--                        @include('website.layouts.footer')--}}
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::App-->
		<!--begin::foot-->
        @include('website.layouts.foot')
		<!--end::foot-->
	</body>
	<!--end::Body-->
</html>