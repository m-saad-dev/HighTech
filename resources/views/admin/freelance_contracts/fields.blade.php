<!--begin::Card body-->
<div class="card-body border-top p-9">
    <!--begin::Input group-->
    <div class="row mb-6">
        <!--begin::Label-->
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.name')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <input type="text" name="name" class="form-control form-control-lg form-control-solid" placeholder="@lang            ('fields.name')" value="{{isset($contract) ? $contract->name : (old('name') ?? '')}}"/>
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
        <label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.service')</label>
        <!--end::Label-->
        <!--begin::Col-->
        <div class="col-lg-8">
            <select name="platform_id" aria-label="{{trans('common.select')}}" data-control="select2"
                data-placeholder="{{trans('common.select')}}" class="form-select form-select-solid form-select-lg fw-semibold">
                @foreach($platforms->pluck('name', 'id')->toArray() as $id => $platform)
                    <option value="{{$id}}" @if(isset($contract) && $contract->platform_id == $id) selected
                        @endif>{{$platform}}</option>
                @endforeach
            </select>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Input group-->

</div>
<!--end::Card body-->
