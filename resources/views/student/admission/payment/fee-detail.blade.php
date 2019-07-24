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
                            <form method="post" action="{{route('student.admission.make-payment')}}">
                                @csrf
                                <div class="row">
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
                                                <td>: {{$application->admittedStudent->uid ?? 'NA'}}</td>
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
                                            @forelse($temp_admission_receipt->tempCollections as $key =>
                                            $tempCollection)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <th>{{$tempCollection->feeHead->name}}</th>
                                                <td class="text-right">{{getDecimal($tempCollection->amount)}}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <th colspan="3">No Fee Structure has been generated for you. Kindly
                                                    contact
                                                    administrative dept.</th>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td><strong>Total</strong></td>
                                                <td class="text-right">
                                                    <strong>{{getDecimal($temp_admission_receipt->total)}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-right"><strong>IN WORDS:
                                                        {{strtoupper(getIndianCurrency($temp_admission_receipt->total))}}</strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <input type="hidden" name="msg" value="{{ $checksum }}">
                                    <button type="submit" class="btn btn-primary">Proceed to Pay</button>
                                </div>
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
