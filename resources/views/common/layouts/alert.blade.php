 @if(Session::has('success'))
 <div class="row">
 	<div class="col-lg-12">
 		<div class="alert {{ Session::get('alert-class', 'alert-success') }}">
 			{{-- <i class="fe fe-check mr-2" aria-hidden="true"></i> --}}
 			<button type="button" class="close" data-dismiss="alert"></button>
 			{!! Session::get('success') !!}
 		</div>
 	</div>
 </div>
 @endif


 @if(Session::has('error'))
 <div class="row">
 	<div class="col-lg-12">
 		<div class="alert {{ Session::get('alert-class', 'alert-danger') }}">
 			{{-- <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i> --}}
 			<button type="button" class="close" data-dismiss="alert"></button>
 			{!! Session::get('error') !!}
 		</div>
 	</div>
 </div>
 @endif


@if(!empty($errors->all()))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{-- <strong><i class="fe fe-bell mr-2" aria-hidden="true"></i></strong>    --}}
    @foreach($errors->all() as $error)
        {{$error}}<br>
    @endforeach
</div>
@endif