@extends('common.admin-app')
@section('title')
Merit List
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset("public/css/animate.css")}}">
<style type="text/css">
    .modal.fade{
        opacity:1;
    }
    .modal.fade .modal-dialog {
        -webkit-transform: translate(0);
        -moz-transform: translate(0);
        transform: translate(0);
    }
    #contain {
      height: 70vh;  
      overflow-y: scroll;  
    }
    #table_scroll {
      /*width: 100%;*/
      margin-top: 100px;
      margin-bottom: 100px;
    }
    #table_scroll tbody td {
      /*padding: 10px;*/
      /*background-color: #7fe55e;*/
      /*color: #fff;*/
    }
    #myTable thead th {
      padding: 10px;
      /*background-color: #b90be0;*/
      /*color: #fff;*/
      font-weight: bold !important;
      color:#000;
    }
    #myTable{
        margin-bottom: 0px !important;
    }
    tr.admission-taken{
        background: #28a745 !important;
        color: #fff;
    }
    tr.application-rejected{
        background: #dc3545 !important;
        color: #fff;
    }
    tr.application-cancelled{
        background: #F5B041 !important;
        color: #fff;
    }
    .seat{
        font-size: 100px;
    }
    [data-notify="container"][class*="alert-pastel-"] {
        background-color: rgb(255, 255, 238);
        border-width: 0px;
        border-left: 15px solid rgb(255, 240, 106);
        border-radius: 0px;
        box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.3);
        font-family: 'Old Standard TT', serif;
        letter-spacing: 1px;
    }
    [data-notify="container"].alert-pastel-warning {
        border-left-color: rgb(255, 179, 40);
    }
    [data-notify="container"].alert-pastel-danger {
        border-left-color: rgb(255, 103, 76);
    }
    [data-notify="container"].alert-pastel-success {
        border-left-color: rgb(108, 220, 133);
    }
    [data-notify="container"].alert-pastel-info {
        border-left-color: rgb(110, 177, 159);
    }
    [data-notify="container"][class*="alert-pastel-"] > [data-notify="title"] {
        color: rgb(80, 80, 57);
        display: block;
        font-weight: 700;
        margin-bottom: 5px;
    }
    [data-notify="container"][class*="alert-pastel-"] > [data-notify="message"] {
        font-weight: 400;
    }
</style>
@stop

@section('content')

@include('common.admin-staff.application.live-merit-list')

@endsection
@section('js')

@include('common.admin-staff.application.live-merit-list-js')

@stop