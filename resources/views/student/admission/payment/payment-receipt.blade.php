@extends('common.student-app')
@section('title')
Payment
@endsection

@section('css')
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
                                <h3 class="card-title">Receipt</h3>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('student.application.index') }}" class="btn btn-warning">Application
                                    List</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-8 offset-md-2">
                            @include('student.admission.payment.receipt-table')
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <div class="d-flex">
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
