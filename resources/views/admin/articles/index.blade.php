@extends('admin.layouts.app')
@section("title", trans("menu.articles"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('menu.articles') => null,
            trans('articles.allArticles') => route('admin.articles.index'),
        ],
    ])
@stop
@section('actions_routes')
    <!--begin::Actions-->
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <!--begin::Secondary button-->
        <!--end::Secondary button-->
        <!--begin::Primary button-->
        <a href="{{route('admin.articles.create')}}" class="btn btn-sm fw-bold btn-primary" > @lang('articles.createArticle')</a>
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
                <h3 class="fw-bold m-0">@lang('articles.allArticles')</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Card body-->
        <div class="card-body p-9">
            @include('admin.articles.table')
            {{$articles->links('pagination.paginator', ['paginator' => $articles, 'filter' => ''])}}
        </div>
        <!--end::Card body-->
    </div>
    <!--end::details View-->
@endsection
