@extends('common.staff-app')
@section('title')
Receipt
@endsection

@section('css')
<style>
  .double-border {
    border: 3px double #ddd;
    padding: 12px 60px !important;
  }

  .receipt-head {
    font-style: italic;
    font-size: 30px;
  }
  @media print {
    #reciept-print {font-size:25px;}
    .receipt-head {font-size: 27px !important;}
    .college-title {font-size: 30px !important; margin-bottom:0.2em!important; }
     td, th {
       font-size: 25px;
     }
     body {
       font-size:25px;
     }
  }

</style>
@stop



@section('content')
@include('common.admin-staff.admission.receipt')
@endsection
@section('js')
@include('common.admin-staff.admission.receipt-js')
@stop


