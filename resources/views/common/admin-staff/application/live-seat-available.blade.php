
<div class="row row-cards">
	<div class="col-12">
		<div class="alert alert-primary">
			{{ucwords(strtolower($reservations[0]->course->name))}} | {{ucwords($reservations[0]->stream->name)}}
		</div>
	</div>
</div>
<div class="row row-cards">
    @php
        $reservation_only_uniques = [];
    @endphp
	@if($is_major)
	@foreach($majors as $subject_id => $major)
	<div class="col-12 major_subject" id="major_subject_{{$subject_id}}">
		<div class="alert alert-primary subject-name">
			{{$major_names->where('id',$subject_id)->first()->name ?? ''}}
		</div>
	</div>
	@foreach($major as $key =>$reservation)
		@php
			$field_id_string = 'reservation_'.request()->get("stream").'_'.$subject_id.'_'.$reservation->category_id;
			$field_id_string_available = 'reservation_'.request()->get("stream").'_'.$subject_id.'_'.$reservation->category_id."_available";
		@endphp
	<div class="col-6 col-sm-4 col-lg-2 reservation">
		<div class="card">
			<div class="card-body p-3 text-center">
			<div class="h1 m-0"><span id="{{$field_id_string}}" class="seat_taken">0</span>/<span class="seat_available" id="{{$field_id_string_available}}">{{$reservation->seat}}</span></div>
			<script type="text/javascript">
				document.addEventListener('DOMContentLoaded', function() {
					{{$field_id_string}} = 
					new Odometer({
			          el: document.querySelector('#{{$field_id_string}}'),
			          value: 0,
			          format: 'dd',

			          // Any option (other than auto and selector) can be passed in here
			          theme: 'minimal'
			        });
					{{$field_id_string_available}} = 
					new Odometer({
			          el: document.querySelector('#{{$field_id_string_available}}'),
			          value: {{$reservation->seat}},
			          format: 'dd',

			          // Any option (other than auto and selector) can be passed in here
			          theme: 'minimal'
			        });
				});
			</script>
				<div class="text-muted mb-4">{{$reservation->category->name}}</div>
			</div>
		</div>
	</div>
    @php
        $reservation_only_uniques[] = $reservation->category_id;
    @endphp
	@endforeach
	@endforeach
	@else
	@foreach($reservations as $key => $reservation)
	@php
		$field_id_string = 'reservation_'.request()->get("stream").'_'.$reservation->category_id;
		$field_id_string_available = 'reservation_'.request()->get("stream").'_'.$reservation->category_id."_available";
	@endphp
	<div class="col-6 col-sm-4 col-lg-2 reservation">
		<div class="card">
			<div class="card-body p-3 text-center">
				<div class="h1 m-0"><span id="{{$field_id_string}}" class="seat_taken">0</span>/<span class="seat_available" id="{{$field_id_string_available}}">{{$reservation->seat}}</span></div>
				<div class="text-muted mb-4">{{$reservation->category->name}}</div>
			</div>
		</div>
	</div>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            {{$field_id_string}} = 
            new Odometer({
              el: document.querySelector('#{{$field_id_string}}'),
              value: 0,
              format: 'dd',

              // Any option (other than auto and selector) can be passed in here
              theme: 'minimal'
            });
            {{$field_id_string_available}} = 
            new Odometer({
              el: document.querySelector('#{{$field_id_string_available}}'),
              value: {{$reservation->seat}},
              format: 'dd',

              // Any option (other than auto and selector) can be passed in here
              theme: 'minimal'
            });
        });
    </script>

    @php
        $reservation_only_uniques[] = $reservation->category_id;
    @endphp
	@endforeach
	@endif
</div>
<script type="text/javascript">
    global_reservation_list  = {{json_encode($reservation_only_uniques)}};
</script>