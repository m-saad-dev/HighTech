<!--begin::Card body-->
<div class="card-body border-top p-9">
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label fw-semibold fs-6">@lang('fields.avatar')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <!--begin::Image input-->
            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/admin/media/svg/avatars/blank.svg')}}}')">
                <!--begin::Preview existing avatar-->
                <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{isset($user) && $user->getFirstMedia('avatars') ? $user->getFirstMedia('avatars')->getFullUrl() : asset('assets/admin/media/svg/avatars/blank.svg')}})"></div>
                <!--end::Preview existing avatar-->
                <!--begin::Label-->
                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <!--begin::Inputs-->
                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="avatar_remove" />
                    <!--end::Inputs-->
                </label>
                <!--end::Label-->
                <!--begin::Cancel-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                      data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                    <i class="bi bi-x fs-2"></i>
                </span>
                <!--end::Cancel-->
                <!--begin::Remove-->
                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                      data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                      title="Remove avatar">
                    <i class="bi bi-x fs-2"></i>
                </span>
                <!--end::Remove-->
            </div>
            <!--end::Image input-->
            <!--begin::Hint-->
            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
            <!--end::Hint-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6"> @lang('fields.role') </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            @if($errors->first('role'))
                <small class="text-danger">{{$errors->first('role')}}</small>
            @endif
            @if(isset($user) && $user->hasRole('Super Admin'))
                <p class="form-control form-control-lg form-control-solid"> {{app()->getLocale() == 'en' ? $allRoles->where('name', 'Super Admin')->first()->name : $allRoles->where('name', 'Super Admin')->first()->name_ar}}</p>
            @else
                <select name="role" aria-label="{{trans('common.select')}}" data-control="select2" data-placeholder="{{trans('common.select')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                    @foreach((app()->getLocale() == 'en' ? $allRoles->pluck('name', 'name')->toArray() : $allRoles->pluck('name_ar', 'name')->toArray()) as $id => $role)
                        <option value="{{$id}}" @if(isset($user) && $user->hasRole($role)) selected @endif>{{$role}}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.name')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.name')" value="{{isset($user) ? $user->name : (old('name') ?? '')}}" />
            @error('name')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">
            <span>@lang('fields.phone_number')</span>
            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="@lang('users.PhoneNumberMustBeActive')"></i>
        </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="tel" name="phone_number" class="form-control form-control-lg form-control-solid text-start" placeholder="@lang('fields.phone_number')" value="{{isset($user) ? $user->phone_number : (old('phone_number') ?? '')}}" />
            @error('phone_number')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>

    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.address')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="text" name="address" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.address')" value="{{isset($user) ? $user->address : (old('address') ?? '')}}" />
            @error('address')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6"> @lang('fields.parent_id') </label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            @if($errors->first('parent_id'))
                <small class="text-danger">{{$errors->first('parent_id')}}</small>
            @endif
                <select name="parent_id" aria-label="{{trans('common.select')}}" data-control="select2" data-placeholder="{{trans('common.select')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                    @foreach((app()->getLocale() == 'en' ? $parents->pluck('name', 'id')->toArray() : $parents->pluck('name_ar', 'id')->toArray()) as $id => $parent)
                        <option value="{{$id}}" @if(isset($user) && $user->parentid == $id) selected @endif>{{$parent}}</option>
                    @endforeach
                </select>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label fw-semibold fs-6">@lang('fields.email')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="email" name="email" class="form-control form-control-lg form-control-solid text-start" placeholder="@lang('fields.email')" value="{{isset($user) ? $user->email : (old('email') ?? '')}}" />
            @error('email')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label fw-semibold fs-6">@lang('fields.password')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8 fv-row">
            <input type="password" name="password" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.password')" value="" />
            @error('password')
            <span class="alert-danger" role="alert"> {{ $message }} </span>
            @enderror
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->
</div>
<!--end::Card body-->
