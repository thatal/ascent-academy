@extends('common.admin-app')
@section('title')
Application
@endsection

@section('css')
@stop



@section('content')
@include('common.admin-staff.application.filter')

@include('common.admin-staff.application.list')

@endsection
@section('js')
@include('common.admin-staff.application.js')

@stop


