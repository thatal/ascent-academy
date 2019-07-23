@extends('common.admin-app')
@section('title')
Subject Allocation Editing
@endsection

@section('css')
<style type="text/css">
    .cursor-help{
        cursor:help !important;
    }
</style>
@stop




@section('content')
<div class="my-3 my-md-5">
    <div class="container">
        @include("common.admin-staff.subject-allocation.edit")
    </div>
</div>
@endsection

@section('js')
@include("common.admin-staff.subject-allocation.js")
@stop