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
					<option value="{{$platform->id}}"  @if(isset($contract) && $contract->platform_id == $platform->id) selected @endif data-kt-rich-content-subcontent="" data-kt-select2-user="{{isset($platform) && $platform->getFirstMedia('icon') ? $platform->getFirstMedia('icon')->getFullUrl() : asset('assets/admin/media/svg/avatars/blank.svg')}}">{{$platform->name}}
					</option>
				@endforeach
			</select>
		</div>
	</div>
	<!--end::Input group-->
	<div class="separator border-secondary my-10"></div>
	<h3 class="text-center fw-semibold fs-6 mb-10">{{__('menu.freelancers')}}</h3>
	<!--begin::Repeater-->
	<div class="row justify-content-center" id="kt_docs_repeater_basic">
		<!--begin::Form group-->
		<div class="form-group">
			<div class="row" data-repeater-list="freelancers">
				<div data-repeater-item>
					<div class="form-group row justify-content-end mb-5">
						<!--begin::Col-->
						<div class="col-md-6">
							<select class="form-select form-select-md" data-kt-repeater="select2"
								data-placeholder="Select an option" >
								{{--							@foreach($contract->freelancers as $contractFreelancer)--}}
								{{--								<option value="{{$contractFreelancer->id}}" @if(isset($contract) && $contractFreelancer->id --}}
								{{--									== $contractFreelancer->pivot->freelancer_id)--}}
								{{--									selected @endif>{{$contractFreelancer->name}}</option>--}}
								{{--							@endforeach--}}
							</select>
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-md-3">
							{{--						<input type="text" name="name" class="form-control form-control-md form-control-solid" placeholder="@lang('fields.fees')" value="--}}{{--{{isset($freelancer) ? $freelancer->name : (old('name') ?? '')}}--}}{{--" />--}}
							@error('name')
							<span class="alert-danger" role="alert"> {{ $message }} </span>
							@enderror
						</div>
						<!--end::Col-->
						<!--begin::Form group-->
						<div class="col-md-2 pe-0">
							<a href="javascript:;" data-repeater-delete class="m-t btn btn-sm btn-light-danger">
								<i class="la la-trash-o fs-3"></i>Delete
							</a>
						</div>
						<!--end::Form group-->
					</div>
				</div>
				<!-- /.row -->
				<!--end::Form group-->
			</div>
			<div class="row justify-content-center mt-5">

				<a href="javascript:;" data-repeater-create class="col-4 btn btn-light-primary">
					<i class="la la-plus fs-3"></i>Add
				</a>
			</div>

		</div>
		<!--end::Repeater-->

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
			$(document).ready(function () {

				$('#kt_docs_select2_users').select2({
					templateSelection: optionFormat,
					templateResult: optionFormat
				});
			});
		</script>
		<script src="{{asset('assets/admin/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
		<script src="{{asset('assets/admin/repeater.js')}}"></script>
	@endpush



	<div class="row" data-repeater-list="freelancers">
		<div data-repeater-item>
			<div class="form-group row justify-content-end mb-5">
				<!--begin::Col-->
				<div class="col-md-6">
					<select class="form-select form-select-md" data-kt-repeater="select2"
						name="{{$index??''}}[name]"
						data-placeholder="Select an option" >
						@foreach($freelancers as $freelancer)
							<option value="{{$freelancer->id}}" @if(isset($contract) && isset($contractFreelancer) && $contractFreelancer->id == $freelancer->id)
								selected @endif>{{$freelancer->name}}</option>
						@endforeach
					</select>
				</div>
				<!--end::Col-->
				<!--begin::Col-->
				<div class="col-md-3">
					<input type="text" name="name" class="form-control form-control-md 
								form-control-solid" placeholder="@lang('fields.fees')" value="{{isset($contract) && isset($contractFreelancer) ? $contractFreelancer->order : (old('name') ?? '')}}" />
					@error('name')
					<span class="alert-danger" role="alert"> {{ $message }} </span>
					@enderror
				</div>
				<!--end::Col-->
				<!--begin::Form group-->
				<div class="col-md-2 pe-0">
					<a href="javascript:;" data-repeater-delete class="m-t btn btn-sm btn-light-danger">
						<i class="la la-trash-o fs-3"></i>Delete
					</a>
				</div>
				<!--end::Form group-->
			</div>
		</div>
	</div>
	<div class="row justify-content-center mt-5">
		<a href="javascript:;" data-repeater-create class="col-4 btn btn-light-primary">
			<i class="la la-plus fs-3"></i>Add
		</a>
	</div>
	<!-- /.row -->

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
			$(document).ready(function () {

				$('#kt_docs_select2_users').select2({
					templateSelection: optionFormat,
					templateResult: optionFormat
				});
			});
		</script>
		<script src="{{asset('assets/admin/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
		<script src="{{asset('assets/admin/repeater.js')}}"></script>
@endpush