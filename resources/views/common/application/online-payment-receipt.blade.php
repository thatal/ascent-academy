<div class="card-body mt-5 mb-5">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td colspan="2" class="text-center bold">Payment Acknowledgement</td>
          </tr>
          <tr>
            <td>Application Number</td>
            <td class="bold">{{$application->id}}</td>
          </tr>
          <tr>
            <td>Transaction ID</td>
            <td class="bold">{{$application->paymentReceipt->transaction_id}}</td>
          </tr>
          <tr>
            <td>Transaction Date</td>
            <td class="bold">{{$application->paymentReceipt->transaction_date}}</td>
          </tr>
          <tr>
            <td>Applicant Name</td>
            <td class="bold">{{$application->fullname}}</td>
          </tr>
          <tr>
            <td>Type of Transaction</td>
            <td class="bold">Online </td>
          </tr>
          <tr>
            <td>Amount</td>
            <td class="bold">{{$application->paymentReceipt->amount}}</td>
          </tr>
          <tr>
            <td>Amount in Word</td>
            <td class="bold">{{config('constants.application_fee_word')}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>