@extends('admin.layouts.app')
@section("title", trans("menu.usersList"))
@section('breadcrumb')
    @include('admin.layouts.breadcrumb_segmants', [
        'menu'      => [
            trans('users.allUsers') => route('admin.users.index'),
            trans('users.createUser') => null,
        ],
    ])
@stop
@section('page_title')
    @lang('users.createUser')
@stop
@section('content')
    <div class="card mb-5 mb-xl-10">
        @if (session()->has('issue_message'))
            <div class="alert alert-danger">{{ session()->get('issue_message') }}</div>
        @endif
        <!--begin::Form-->
        <form class="form" action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.users.fields')
        </form>
        <!--end::Form-->
    </div>
@endsection
