@extends('common.student-app')
@section('title')
Admission
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@stop

@section('content')

<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-auto mr-auto">
                                <h3 class="card-title">Fees Details</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-2">
                        <form method="post" action="{{config('constants.url')}}">
                                @csrf
                                @include('student.admission.payment.receipt-table')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('js')

@stop
