@extends('common.admin-app')
@section('title')
I Card
@endsection

@section('css')
<style type="text/css">
    .cursor-help{
        cursor:help !important;
    }
    @media print {
      body, html, #print {
          width: 100%;
      }
     #tbl{
background-color: #FFFF00
}
}
body{
	color: #000;
}

</style>
@stop




@section('content')
<div class="my-3 my-md-5">
    <div class="container">
        @include("common.i-card")
    </div>
</div>
@endsection

