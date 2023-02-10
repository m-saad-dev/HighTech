@extends('admin.layouts.app')
@section("title", trans("menu.freelancers"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('menu.freelancers') => route('admin.freelancers.index'),
            trans('freelancers.editFreelancer') => null,
        ],
    ])
@stop
@section('page_title')
    @lang('freelancers.editFreelancer')
@stop
@section('actions')
    <a href="{{url()->previous()}}" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">@lang('common.back')</a>
@stop
@section('content')
    <div class="card mb-5 mb-xl-10">
        @if (session()->has('issue_message'))
            <div class="alert alert-danger">{{ session()->get('issue_message') }}</div>
        @endif
        <!--begin::Form-->
        <form class="form" action="{{route('admin.freelancers.update', ['freelancer' => $freelancer->id])}}" 
              method="POST" 
              enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            @include('admin.freelancers.edit_fields', $freelancer)
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">@lang('common.cancel')</button>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">@lang('common.save')</button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
@endsection
