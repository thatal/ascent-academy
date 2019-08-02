@extends('common.admin-app')
@section('title')
Application Fee Create
@endsection

@section('css')
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form name="application" id="application" method="post"
                            action="{{route('admin.miscellaneous.online-application-fee.store')}}" autocomplete="off">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div class="col-auto mr-auto">
                                        <h3 class="card-title">Application Fee Create</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Application Id</label>
                                            <input type="text" class="form-control" name="application_id" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Student Id</label>
                                            <input type="text" class="form-control" name="student_id" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Transaction Id</label>
                                            <input type="text" class="form-control" name="transaction_id" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Transaction Date</label>
                                            <input type="text" class="form-control" id="transaction_date" name="transaction_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Biller Response</label>
                                            <input type="text" class="form-control" name="biller_response"
                                                value="manual" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Amount</label>
                                            <input type="number" class="form-control" name="amount"
                                                value="{{config('constants.application_fee')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label">Code</label>
                                            <input type="text" class="form-control" name="code" value="0300" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
    $('#transaction_date').Zebra_DatePicker({
        format: 'Y-m-d'
    });
  </script>
@stop
