@extends('common.student-app')
@section('title')
Application
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
                <h3 class="card-title">Payment Details</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
              <div class="row">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <th>Application ID</th>
                      <td>{{$application->id}}</td>
                    </tr>
                    <tr>
                      <th>Fullname</th>
                      <td>{{$application->fullname}}</td>
                    </tr>
                    <tr>
                      <th>Course</th>
                      <td>{{$application->course->name}}</td>
                    </tr>
                    <tr>
                      <th>Semester/Year</th>
                      <td>{{$application->semester->name}}</td>
                    </tr>
                    <tr>
                      <th>Stream</th>
                      <td>{{$application->appliedStream->stream->name}}</td>
                    </tr>
                    <tr>
                      <th>Payable Amount</th>
                      <td>{{$amount}}.00</td>
                    </tr>
                  </tbody>
                </table>
                @if(config('constants.current_time') >= strtotime(config('constants.apply_up_time')) && config('constants.current_time') <= strtotime(config('constants.apply_down_time')))
                    <button type="submit" class="btn btn-primary" id="paymentButton">Proceed to Pay</button>
                @endif
              </div>
                <form name='payabbhiform'
                    action="{{route("student.application.process-payment-post", Crypt::encrypt($application->id))}}" method="POST"
                    style="display:none">
                    {{-- form data will be posted and recieved --}}
                    {{ csrf_field() }}
                    <input type="hidden" name="merchant_order_id" value="{{$merchantOrderID}}">
                    <input type="hidden" name="order_id" id="order_id">
                    <input type="hidden" name="payment_id" id="payment_id">
                    {{-- <input type="hidden" name="name" id="name" value="{{$application->fullname}}"> --}}
                    <input type="hidden" name="amount" id="amount" value="{{$amount}}">
                    {{-- <input type="hidden" name="student_id" id="student_id" value="{{$application->student_id}}"> --}}
                    <input type="hidden" name="application_id" id="application_id" value="{{$application->id}}">
                    <input type="hidden" name="payment_signature" id="payment_signature">
                    <input type="hidden" name="is_error" id="is_error">
                    <input type="hidden" name="error_message" id="error_message">
                    <input type="hidden" name="response" id="response">
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection


@section('js')
<script src="https://checkout.payabbhi.com/v1/checkout.js"></script>
<script>
    var options = {!!json_encode($data)!!};
    options.handler = function (response){
        document.getElementById('order_id').value = response.order_id;
        document.getElementById('payment_id').value = response.payment_id;
        document.getElementById('payment_signature').value = response.payment_signature;
        document.getElementById('response').value = JSON.stringify(response);
        document.getElementById('is_error').value = response.is_error;
        document.getElementById('error_message').value = response.error_message;
        document.payabbhiform.submit();
    };

    var payabbhi = new Payabbhi(options);

    document.getElementById('paymentButton').onclick = function(e){
        payabbhi.open();
        e.preventDefault();
    }
</script>
@stop


