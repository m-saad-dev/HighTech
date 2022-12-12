@extends('admin.layouts.app')
@section("title", trans("menu.roles"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('roles.allRoles') => route('admin.roles.index'),
            trans('roles.createRole') => null,
        ],
    ])
@stop
@section('page_title')
    @lang('roles.createRole')
@stop
@section('content')
    <div class="card mb-5 mb-xl-10">
        @if (session()->has('issue_message'))
            <div class="alert alert-danger">{{ session()->get('issue_message') }}</div>
        @endif
        <!--begin::Form-->
        <form class="form" action="{{route('admin.roles.store')}}" method="POST">
            @csrf
            @include('admin.roles.fields')
        </form>
        <!--end::Form-->
    </div>
@endsection
