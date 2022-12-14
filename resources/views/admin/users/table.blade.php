<!--begin::Table-->
<table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
    <!--begin::Thead-->
    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
    <tr>
        <th class="min-w-250px">#</th>
        <th class="min-w-100px">@lang('fields.name')</th>
        <th class="min-w-150px">@lang('fields.email')</th>
        <th class="min-w-150px">@lang('fields.role')</th>
    </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody class="fw-6 fw-semibold text-gray-600">
    @foreach($users as $user)
        <tr>
            <td class="col-1">
                <span class="badge badge-light-success">{{$loop->iteration}}</span>
            </td>
            <td>
                <a href="{{route('admin.users.show', $user->id)}}" class="badge badge-light-primary fs-7 fw-bold text-decoration-none">{{$user->name}}</a>
            </td>
            <td>
                <a href="javascript::void(0);" class="text-hover-primary text-gray-600">{{$user->email}}</a>
            </td>
            <td>
                <span class="text-hover-primary text-gray-600">{{$user->roles?->first()?->name . ' - ' . $user->roles?->first()?->name_ar}}</span>
            </td>
            <td class="text-start">
                @if(auth()->id() == 1 || (auth()->id() != 1 && $user->id != 1))
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

                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4 align-center" data-kt-menu="true">
                        <!--begin::Menu item-->
                        @can('edit-user')
                            <div class="menu-item px-3">
                                <a href="{{route('admin.users.edit', $user->id)}}" class="menu-link px-3">@lang('common.edit')</a>
                            </div>
                        @endcan
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        @can('delete-user')
                            @if( $user->id != 1 )
                                <form method="post" id="my_form" class="menu-item px-3" action="{{route('admin.users.destroy', $user->id)}}">
                                    @csrf @method('Delete')
                                <a role="button" href="javascript::void();" onclick="this.closest('form').submit()" methods='DELETE' class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">@lang('common.delete')</a>
                                </form>
                            @endif
                        @endcan
                        <!--end::Menu item-->
                    </div>
                    <!--end::Actions-->
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
    <!--end::Tbody-->
</table>
<!--end::Table-->
