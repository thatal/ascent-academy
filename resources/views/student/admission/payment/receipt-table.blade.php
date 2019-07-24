<div class="container">
    <div class="row">
        @isset($receipt)
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
        @endisset
        <br>
        <table width="100%">
            <tbody>
                @isset($receipt)
                <tr>
                    <th>Receipt No</th>
                    <td>: {{$receipt->receipt_no}}</td>
                    <th>Date</th>
                    <td>: {{$receipt->created_at}}</td>
                </tr>
                @endisset
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
                @isset($temp_receipt)
                @forelse($temp_receipt->tempCollections as $key =>$tempCollection)
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
                @endisset
                @isset($receipt)
                @forelse($receipt->Collections as $key =>$Collection)
                <tr>
                    <td>{{$key+1}}</td>
                    <th>{{$Collection->feeHead->name}}</th>
                    <td class="text-right">{{getDecimal($Collection->amount)}}</td>
                </tr>
                @empty
                <tr>
                    <th colspan="3">No Fee Structure has been generated for you. Kindly
                        contact
                        administrative dept.</th>
                </tr>
                @endforelse
                @endisset
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td class="text-right">
                        @isset($temp_receipt)
                        <strong>{{getDecimal($temp_receipt->total)}}</strong>
                        @endisset
                        @isset($receipt)
                        <strong>{{getDecimal($receipt->total)}}</strong>
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right"><strong>IN WORDS:
                            @isset($temp_receipt)
                            {{strtoupper(getIndianCurrency($temp_receipt->total))}}
                            @endisset
                            @isset($receipt)
                            {{strtoupper(getIndianCurrency($receipt->total))}}
                            @endisset
                        </strong>
                    </td>
                </tr>
            </tfoot>
        </table>
        @isset($checksum)
        <input type="hidden" name="msg" value="{{ $checksum }}">
        <button type="submit" class="btn btn-primary">Proceed to Pay</button>
        @endisset
    </div>
</div>
