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
        @if($receipts && $receipts->count())
                @foreach($receipts->sortByDesc('id') as $key => $receipt)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div class="col-auto mr-auto">
                                        <h3 class="card-title">Examination Fee Receipt</h3>
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
        @else
            @php
                $checksum   = "";
                $total      = 0.00;
            @endphp
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row justify-content-between">
                                <div class="col-auto mr-auto">
                                    <h3 class="card-title">Examination Fees Details</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-8 offset-md-2">
                                <form method="post" action="{{config('constants.url')}}">
                                    @csrf
                                    {{-- @include('student.admission.payment.receipt-table') --}}
                                    <div class="container">
                                        <div class="row">
                                            <table width="100%">
                                                <tbody>
                                                    <tr class="text-center">
                                                        <td width="30%"></td>
                                                        <td width="40%">
                                                            <div class="card-body text-center">
                                                                <h3 class="receipt-head">Receipt</h3>
                                                                <h3 class="college-title">DARRANG&nbsp;COLLEGE</h3>
                                                                <p class="">
                                                                    Tezpur, Assam, Sonitpur,
                                                                    <br />Pin-784001
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td width="30%"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table width="100%">
                                                <tbody>
                                                    <tr>
                                                        <th>Name of Student</th>
                                                        <td>: {{$application->fullname}}</td>
                                                        <th>Course</th>
                                                        <td>: {{$application->appliedStream->stream->abbreviation}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sub</th>
                                                        <td colspan="3">:
                                                            @foreach($application->appliedSubjects as $key =>
                                                            $applied_subject){{$key!=0?'+':''}}{{$applied_subject->subject->abbreviation}}@endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Semester/Year</th>
                                                        <td>: {{$application->semester->name}}</td>
                                                        <th>UID</th>
                                                        <td>: {{$application->admittedStudentLatest->uid ?? 'NA'}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sl No.</th>
                                                        <th>Particulars</th>
                                                        <th class="text-right">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($fees)
                                                        @foreach($fees->feeStructures as $key => $fee)
                                                            <tr>
                                                                <td>{{$key+1}}</td>
                                                                <th>{{$fee->feeHead->name}}</th>
                                                                <td class="text-right">{{getDecimal($fee->amount)}}</td>
                                                            </tr>
                                                        @endforeach
                                                        @php
                                                            $total = $fees->feeStructures->sum('amount');
                                                            $checksum = generateCheckSum($application, "EXAM".date("Ym").$application->id, $total, $type = "examination");
                                                        @endphp
                                                    @else
                                                        <tr>
                                                            <th colspan="3">No Fee Structure has been generated for you. Kindly
                                                                contact
                                                                administrative dept.</th>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td><strong>Total</strong></td>
                                                        <td class="text-right">
                                                                {{getDecimal($total)}}
                                                        </td>
                                                    </tr>
                                                    <td colspan="3" class="text-right"><strong>IN WORDS:
                                                            {{strtoupper(getIndianCurrency($total))}}
                                                        </strong>
                                                    </td>
                                                </tbody>
                                            </table>
                                            {{-- biotechnology Student not available --}}
                                            @if(isset($checksum) && $fees && !$latest_application->appliedStream()->where("stream_id", "=", 10)->count())
                                                {{-- @if(config('constants.current_time') >= strtotime(config('constants.admission_up_time')) && config('constants.current_time') <= strtotime(config('constants.admission_down_time'))) --}}
                                                    <input type="hidden" name="msg" value="{{ $checksum }}">
                                                    <button type="submit" class="btn btn-primary">Proceed to Pay</button>
                                                {{-- @endif --}}
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    </div>
</div>


@endsection


@section('js')
@include('common.admin-staff.admission.receipt-js')
@stop
