<!--begin: Datatable-->
<table class="table table-separate table-head-custom" id="kt_datatable">
    <thead>
    <tr>
        <th>@lang('fields.name') @lang('common.inEn')</th>
        <th>@lang('fields.name') @lang('common.inAr')</th>
        <th>{{trans("common.actions")}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>{{ $role->name_ar }}</td>
            @if(auth()->id() == 1 || (auth()->id() != 1 && $role->id != 1))
                <td class="text-start">
                        <!--begin::Actions-->
                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">@lang('common.actions')
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-5 m-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                            </svg>
                        </span>
                            <!--end::Svg Icon-->
                        </a>

                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{route('admin.roles.edit', $role->id)}}" class="menu-link px-3">@lang('roles.editRole')</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            @if( $role->id != 1 )
                                <form method="post" id="my_form" class="menu-item px-3" action="{{route('admin.roles.destroy', $role->id)}}">
                                    @csrf @method('Delete')
                                <a role="button" href="javascript::void();" onclick="this.closest('form').submit()" methods='DELETE' class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">@lang('roles.deleteRole')</a>
                                </form>
                            @endif
                            <!--end::Menu item-->
                        </div>
                        <!--end::Actions-->
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
