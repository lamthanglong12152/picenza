@extends('admin.index')

@section('pageTitle', 'THÊM MỚI')

@section('admin.css')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('breadcrumbContent')
    <li class="breadcrumb-item"><a href="#">Quản lý trang</a></li>
    <li class="breadcrumb-item active">Thêm mới</li>
@endsection

@section('content')
    {!! Menu::render() !!}
@endsection

@section('admin.js')
    <script src="{{asset('js/admin.js')}}"></script>
    {!! Menu::scripts() !!}
@endsection
