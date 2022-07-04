@extends('Layout.app')
@section('title')
    Home
@endsection

@section('content')
    @include('Component.HomeBanner')
    @include('Component.HomeService')
    @include('Component.HomeCourse')
@endsection

