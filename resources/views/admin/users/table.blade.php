<!--begin::Table-->
<table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
    <!--begin::Thead-->
    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
    <tr>
        <th class="min-w-250px">#</th>
        <th class="min-w-100px">@lang('fields.name')</th>
        <th class="min-w-150px">@lang('fields.email')</th>
    </tr>
    </thead>
    <!--end::Thead-->
    <!--begin::Tbody-->
    <tbody class="fw-6 fw-semibold text-gray-600">
    @foreach($users as $user)
        <tr>
            <td class="w-20px">
                <span class="badge badge-light-success">{{$loop->iteration}}</span>
            </td>
            <td>
                <span class="badge badge-light-success fs-7 fw-bold">{{$user->name}}</span>
            </td>
            <td>
                <a href="javascript::void(0);" class="text-hover-primary text-gray-600">{{$user->email}}</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    <!--end::Tbody-->
</table>
<!--end::Table-->
