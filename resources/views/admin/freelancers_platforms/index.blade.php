@extends('admin.layouts.app')
@section("title", trans("menu.freelancersPlatforms"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('menu.freelancersPlatforms') => null,
            trans('freelancers_platforms.allFreelancersPlatforms') => route('admin.freelancers-platforms.index'),
        ],
    ])
@stop
@section('actions_routes')
    <!--begin::Actions-->
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <!--begin::Secondary button-->
        <!--end::Secondary button-->
        <!--begin::Primary button-->
        <a href="{{route('admin.freelancers-platforms.create')}}" class="btn btn-sm fw-bold btn-primary" >
            {{__('freelancers_platforms.createFreelancersPlatform')}}
        </a>
        <!--end::Primary button-->
    </div>
    <!--end::Actions-->
@stop
@section('content')
    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{__('freelancers_platforms.allFreelancersPlatforms')}}</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
            @include('admin.freelancers_platforms.table')
            {{$platforms->links('pagination.paginator', ['paginator' => $platforms, 'filter' => 
            ''])}}
        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
@endsection
