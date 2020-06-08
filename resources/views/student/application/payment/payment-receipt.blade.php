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
                <h3 class="card-title">Payment Acknowledgement</h3>
              </div>
              <div class="col-auto">
                <a href="{{ route('student.application.index') }}" class="btn btn-warning">Application List</a>
              </div>
            </div>
          </div>
          @include('common.application.online-payment-receipt')
          <div class="card-footer text-right">
            <div class="d-flex">
                <button type="button" class="btn btn-default" onclick="printDiv()"><i class="fa fa-print"></i> Print</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection


@section('js')
<script>
    function printDiv(elem)
    {
    var mywindow = window.open('', 'PRINT');

    mywindow.document.body.innerHTML= document.getElementById("printTable").outerHTML;
    mywindow.document.head.innerHTML= ' <link rel="stylesheet" href="{{asset("public/admin/assets/css/dashboard.css")}}">';
    // mywindow.document.write('<html> <head>');

        // mywindow.document.write(' <link rel="stylesheet" href="{{asset("assets/css/bootstrap2.min.css")}}"> </head> <body>');
        // mywindow.document.write(document.getElementById(elem).outerHTML);
        // mywindow.document.write('</body> </html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    // mywindow.close();

    return true;

    }
</script>
@stop


