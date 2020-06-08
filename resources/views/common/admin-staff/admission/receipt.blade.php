<div class="my-3 my-md-5">
    <div class="container">
        @foreach($application->receipts->sortByDesc('id') as $key => $receipt)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-auto mr-auto">
                                <h3 class="card-title">Receipt</h3>
                            </div>
                            <div class="col-auto mr-right">
                                <button type="button" class="btn btn-primary"
                                    onclick="printDiv('reciept-print-{{$key}}')"><i class="fa fa-print"></i>
                                    Print</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div id="reciept-print-{{$key}}">
                                        <div class="container">
                                            <div class="row ">
                                                <div class="col-md-12 double-border">
                                                    <table width="100%">
                                                        <tbody>
                                                            <tr class="text-center">
                                                                <td width="30%"></td>
                                                                <td width="40%">
                                                                    <div class="card-body text-center">
                                                                        <h3 class="receipt-head">Receipt</h3>
                                                                        <h3 class="college-title">ASCENT ACADEMY JUNIOR COLEGE</h3>
                                                                        <p class="">
                                                                            Beltola Road, Survey, Assam, Kamrup, <br />Pin-781028
                                                                        </p>
                                                                    </div>
                                                                </td>
                                                                <td width="30%"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <table width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <th>Receipt No</th>
                                                                <td>: {{$receipt->receipt_no}}</td>
                                                                <th>Date</th>
                                                                <td>: {{$receipt->created_at}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Name of Student</th>
                                                                <td>: {{$application->fullname}}</td>
                                                                <th>Course</th>
                                                                <td>:
                                                                    {{$application->appliedStream->stream->abbreviation}}
                                                                </td>
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
                                                                <td>: {{$application->admittedStudent->uid}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <table class="" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl No.</th>
                                                                <th>Particulars</th>
                                                                <th class="text-right">Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($receipt->collections as $key =>
                                                            $collection)
                                                            <tr>
                                                                <td>{{$key+1}}</td>
                                                                <td>{{$collection->feeHead->name}}</td>
                                                                <td class="text-right">
                                                                    {{getDecimal($collection->amount)}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td></td>
                                                                <td><strong>Total</strong></td>
                                                                <td class="text-right">
                                                                    <strong>{{getDecimal($receipt->total)}}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" class="text-right"><strong>IN WORDS:
                                                                        {{strtoupper(getIndianCurrency($receipt->total))}}</strong>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                    <br><br><br>
                                                    <table width="100%">
                                                        <tr>
                                                            <td align="left">Paid By:
                                                                {{$receipt->pay_method}}
                                                                @if($receipt->total==0)(Free
                                                                Admission)@endif</td>
                                                            <td align="right">Signature</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left">
                                                                @if($receipt->colletion_done_by_id)
                                                                Collected By: {{$receipt->collectedBy->name ?? 'NA'}}
                                                                @else
                                                            <form method="post" action="{{ auth()->guard('admin')->check()? route('admin.admission.receipt-collected-by-update'): route('staff.admission.receipt-collected-by-update') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="receipt_id"
                                                                        value="{{$receipt->id}}">
                                                                    <button type="submit"
                                                                        class="btn btn-info">Collect</button>
                                                                </form>
                                                                @endif
                                                            </td>
                                                            <td align="right"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
