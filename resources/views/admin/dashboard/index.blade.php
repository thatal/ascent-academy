@extends('common.admin-app')
@section('title')
Dashboard
@endsection

@section('css')
<link href="{!!asset('public/admin/assets/plugins/charts-c3/plugin.css')!!}" rel="stylesheet" />
<style>
.height-300 {
    height: 300px;
    width: 100%;
  }
</style>
@stop

@section('content')
@include('common.admin-staff.dashboard.index')
@endsection


@section('js')

@stop


