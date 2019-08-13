@extends('common.student-app')
@section('title')
Payment
@endsection

@section('css')
<style>
    .double-border {
        border: 3px double #ddd;
        padding: 12px 60px !important;
    }

    .receipt-head {
        font-style: italic;
        font-size: 18px;
    }

    @media print {
        #reciept-print {
            font-size: 25px;
        }

        .receipt-head {
            font-size: 27px !important;
        }

        .college-title {
            font-size: 30px !important;
            margin-bottom: 0.2em !important;
        }

        td,
        th {
            font-size: 25px;
        }

        body {
            font-size: 25px;
        }
    }
</style>
@stop

@section('content')

<div class="my-3 my-md-5">
    <div class="container">
        @isset($receipts)
            @foreach($receipts->sortByDesc('id') as $key => $receipt)
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between">
                                <div class="col-auto mr-auto">
                                    <h3 class="card-title">Receipt</h3>
                                </div>
                                <div class="col-auto mr-right">
                                <button type="button" class="btn btn-primary" onclick="printDiv('reciept-print-{{$key}}')"><i
                                            class="fa fa-print"></i> Print</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-8 offset-md-2">
                                <div id="reciept-print-{{$key}}">
                                    @include('student.admission.payment.receipt-table')
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <div class="d-flex">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endisset
    </div>
</div>


@endsection


@section('js')
@include('common.admin-staff.admission.receipt-js')
@stop
