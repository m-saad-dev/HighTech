<!--begin::Card body-->
<div class="card-body border-top p-9">
	<!--begin::Input group-->
	<div class="row mb-6">
		<!--begin::Label-->
		<label class="col-lg-4 col-form-label fw-semibold fs-6">@lang('fields.logo')</label>
		<!--end::Label-->
		<!--begin::Col-->
		<div class="col-lg-8">
			<!--begin::Image input-->
			<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/admin/media/svg/avatars/blank.svg')}}}')">
				<!--begin::Preview existing avatar-->
				<div class="image-input-wrapper w-125px h-125px" style="background-image: url({{isset($contract) && 
                $contract->getFirstMedia('logo') ? $contract->getFirstMedia('logo')->getFullUrl() : asset
                ('assets/admin/media/svg/avatars/blank.svg')}})"></div>
				<!--end::Preview existing avatar-->
				<!--begin::Label-->
				<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change logo">
					<i class="bi bi-pencil-fill fs-7"></i>
					<!--begin::Inputs-->
					<input type="file" name="image[logo]" accept=".png, .jpg, .jpeg"/>
					<input type="hidden" name="logo_remove"/>
					<!--end::Inputs-->
				</label>
				<!--end::Label-->
				<!--begin::Cancel-->
				<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
					data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel logo">
                    <i class="bi bi-x fs-2"></i>
                </span>
				<!--end::Cancel-->
				<!--begin::Remove-->
				<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
					data-kt-image-input-action="remove" data-bs-toggle="tooltip"
					title="Remove logo">
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
		<label class="col-lg-4 col-form-label fw-semibold fs-6">@lang('fields.info')</label>
		<!--end::Label-->
		<!--begin::Col-->
		<div class="col-lg-8">
			<!--begin::Image input-->
			<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/admin/media/svg/avatars/blank.svg')}}}')">
				<!--begin::Preview existing avatar-->
				<div class="image-input-wrapper w-125px h-125px" style="background-image: url({{isset($contract) && 
                $contract->getFirstMedia('image') ? $contract->getFirstMedia('image')->getFullUrl() : asset
                ('assets/admin/media/svg/avatars/blank.svg')}})"></div>
				<!--end::Preview existing avatar-->
				<!--begin::Label-->
				<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change logo">
					<i class="bi bi-pencil-fill fs-7"></i>
					<!--begin::Inputs-->
					<input type="file" name="image[info]" accept=".png, .jpg, .jpeg"/>
					<input type="hidden" name="info_remove"/>
					<!--end::Inputs-->
				</label>
				<!--end::Label-->
				<!--begin::Cancel-->
				<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
					data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel info">
                    <i class="bi bi-x fs-2"></i>
                </span>
				<!--end::Cancel-->
				<!--begin::Remove-->
				<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
					data-kt-image-input-action="remove" data-bs-toggle="tooltip"
					title="Remove info">
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
		<label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.companyName')</label>
		<!--end::Label-->
		<!--begin::Col-->
		<div class="col-lg-8">
			<input type="text" name="company_name" class="form-control form-control-lg form-control-solid" placeholder="@lang('fields.companyName')" value="{{isset($contract) ? $contract->company_name : (old('company_name')?? '')}}"/>
			@error('company_name')
			<span class="alert-danger" role="alert"> {{ $message }} </span>
			@enderror
		</div>
		<!--end::Col-->
	</div>
	<!--end::Input group-->
	<!--begin::Input group-->
	<div class="row mb-6">
		<!--begin::Label-->
		<label class="col-lg-4 col-form-label required fw-semibold fs-6">@lang('fields.platform')</label>
		<!--end::Label-->
		<!--begin::Col-->
		<div class="col-lg-8 border rounded">
			<select name="platform_id" class="form-select form-select-transparent" data-placeholder="..."
				id="kt_docs_select2_users">
				id="kt_docs_select2_users">
				@foreach($platforms as $platform)
					<option value="{{$platform->id}}"  @if(isset($contract) && $contract->platform_id == $platform->id) 
						selected 
                        @endif data-kt-rich-content-subcontent="" data-kt-select2-user="{{isset($platform) && $platform->getFirstMedia('icon') ? $platform->getFirstMedia('icon')->getFullUrl() : asset('assets/admin/media/svg/avatars/blank.svg')}}">{{$platform->name}}</option>
				@endforeach

			</select>
		</div>
	</div>
	<!--end::Input group-->
</div>
<!--end::Card body-->
@push('js')
	<script>
		// Format options
		var optionFormat = function(item) {
			if ( !item.id ) {
				return item.text;
			}

			var span = document.createElement('span');
			var imgUrl = item.element.getAttribute('data-kt-select2-user');
			var template = '';

			template += '<img src="' + imgUrl + '" class="rounded-circle h-20px me-2" alt="image"/>';
			template += item.text;

			span.innerHTML = template;

			return $(span);
		}

		// Init Select2 --- more info: https://select2.org/
		$('#kt_docs_select2_users').select2({
			templateSelection: optionFormat,
			templateResult: optionFormat
		});
	</script>
@endpush