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
            @isset($temp_admission_receipt)
            @forelse($temp_admission_receipt->tempCollections as $key =>$tempCollection)
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
            @isset($admission_receipt)
            @forelse($admission_receipt->Collections as $key =>$Collection)
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
                    @isset($temp_admission_receipt)
                    <strong>{{getDecimal($temp_admission_receipt->total)}}</strong>
                    @endisset
                    @isset($admission_receipt)
                    <strong>{{getDecimal($admission_receipt->total)}}</strong>
                    @endisset
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-right"><strong>IN WORDS:
                        @isset($temp_admission_receipt)
                        {{strtoupper(getIndianCurrency($temp_admission_receipt->total))}}
                        @endisset
                        @isset($admission_receipt)
                        {{strtoupper(getIndianCurrency($admission_receipt->total))}}
                        @endisset
                    </strong>
                </td>
            </tr>
        </tfoot>
    </table>
    <input type="hidden" name="msg" value="{{ $checksum }}">
    <button type="submit" class="btn btn-primary">Proceed to Pay</button>
</div>
