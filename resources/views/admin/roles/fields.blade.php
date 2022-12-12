<!--begin::Card body-->
<div class="card-body border-top p-9">

    <div class="row mb-6">
        <label class="col-sm-2 col-form-label fs-5">@lang('roles.RoleName')</label>
        <div class="col-sm-10">
            <input type="text" name='name_ar' class="form-control form-control-solid col-8 mb-3" value="{{ $role->name_ar??(old('name_ar')??'') }}" autocomplete="off" required>
        </div>
    </div>

    <div class="row mb-6">
        <label class="col-sm-2 col-form-label fs-5">@lang('roles.RoleNameEn')</label>
        <div class="col-sm-10">
            <input @if(isset($role->id) && in_array($role->id , [1,2,3,4])) readonly @endif type="text" name='name' class="form-control form-control-solid col-8 mb-3" value="{{ $role->name??(old('name')??'') }}" autocomplete="off" required>
        </div>
    </div>
    @if( !auth()->user()->getPermissionsViaRoles()->isEmpty())
        <div class="row mb-6">
            <label class="col-sm-2 col-form-label fs-5 pt-0">@lang('roles.SelectRoles')</label>
            <div class="col-sm-10">
                <label class="form-check form-check-custom form-check-solid me-9">
                    <input class="form-check-input" type="checkbox" data-kt-check="true" id="kt_roles_select_all"
                           data-kt-check-target=".form-check-input" value="1"> <span class="form-check-label"                                                                   for="kt_roles_select_all">@lang('roles.selectAllPermissions')</span>
                </label>
            </div>
        </div>
    @endif
    @foreach($allPermissions->groupBy('permission_group') as $groupName => $groupPermissions )
        @if(($loop->iteration) % 2 != 0  )
            <div class="row justify-content-center">
        @endif
        @canany($groupPermissions->pluck('name')->toArray())
            <div class="m-5">
                <div class="row card card-custom card-stretch gutter-b example example-compact">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label"> {{trans(ucwords(str_replace('-', ' ', $groupName)))}}</h3>
                        </div>
                        <div class="card-toolbar">
                            <label class="form-check form-check-custom form-check-solid me-9">
                                <input class="form-check-input select-all" id="{{$groupName.'-select-all'}}" groupName="{{$groupName}}" type="checkbox" data-kt-check="true" data-kt-check-target="#{{Str::slug($groupName, '_')}} .form-check-input" value="1" >
                                <span class="form-check-label" for="kt_roles_select_all">@lang('common.selectAll')</span>
                            </label>
                        </div>
                    </div>
                    <div class="card-body" id="{{Str::slug($groupName, '_')}}">
                        @foreach($groupPermissions as $permission)
                            @can($permission->name)
                            <!--begin::Checkbox-->
                            <label class="form-check form-check-sm form-check-custom form-check-solid mb-1 ">
                                <input class="form-check-input {{$groupName}}-select-one" checkBoxGroup="{{Str::slug($groupName, '_')}}" onclick="checkUnSelected('{{$groupName}}')" type="checkbox" value="{{$permission->id}}" name="selected[]"  @if(isset($role)/* && $role->guard_name == $guardName*/ && $role->hasPermissionTo($permission->name)) checked @endif />
                                <span class="form-check-label" data-toggle="tooltip" data-placement="right" title="Tooltip on right">{{app()->getLocale() == 'ar' ? $permission->ar_display_name : $permission->display_name}}</span>
                            </label>
                            <!--end::Checkbox-->
                            @endcan
                        @endforeach
                    </div>
                </div>
            </div>
        @endcanany
        @if(($loop->iteration +1) % 2 != 0  && $loop->remaining != 0)
            </div>
        @elseif($loop->remaining == 0)
        </div>
        @endif
    @endforeach
</div>
<!--end::Card body-->
<!--begin::Actions-->
<div class="card-footer d-flex justify-content-end py-6 px-9">
    <button type="reset" class="btn btn-light btn-active-light-primary me-2">@lang('common.cancel')</button>
    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">@lang('common.save')</button>
</div>
<!--end::Actions-->

@push('js')
    <script>
        function checkCheckAllSelected(){
                    if($('.select-all:checked').length != 0 && $('.select-all:checked').length == $('.select-all').length){
                        $('#kt_roles_select_all').prop('checked', true)
                    } else {
                        $('#kt_roles_select_all').prop('checked', false)
                    }
        }

        $('.select-all').each(function (index, group){
            let groupSelectOne = $('.' + group.getAttribute('groupName') + '-select-one:checked');
            if (groupSelectOne.length == $('.' + group.getAttribute('groupName') +'-select-one').length) {
                group.setAttribute('checked', true);
            } else {
                group.removeAttribute('checked');
            }
        })
        checkCheckAllSelected();
    </script>
    <script>
        function checkUnSelected(group){
            if ($('#' + group + '-select-all').is(':checked')) {
                $('#' + group + '-select-all').prop('checked', false);
                $('#kt_roles_select_all').prop('checked', false)
            } else {
                if ($('.' + group + '-select-one:checked').length == $('.' + group +'-select-one').length) {
                    $('#' + group + '-select-all').prop('checked', true);
                    checkCheckAllSelected();
                } else {
                    $('#' + group + '-select-all').prop('checked', false);
                    checkCheckAllSelected();
                }
            }
        };

    </script>
@endpush
