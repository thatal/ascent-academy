@extends('common.admin-app')
@section('title')
Seat Available
@endsection

@section('css')
<style type="text/css">    
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

@include('common.admin-staff.application.live-seat-available')

@endsection
@section('js')

@include('common.admin-staff.application.live-seat-available-js')

@stop