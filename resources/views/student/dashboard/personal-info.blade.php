@extends('common.student-app')
@section('title')
{{-- Confirm Student Information --}}
@endsection

@section('css')
@stop


@section('content')

<div class="my-3 my-md-5">
    <div class="container">
        <div class="row">
            <div class="col-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div class="col-auto mr-auto">
                                <h3 class="card-title">Confirm Student Information</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <form method="post" action="{{route('student.renewal.personal-info.edit')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input type="number" name="mobile_no" class="form-control" value="{{$application->mobile_no}}" placeholder="Mobile No" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{$application->email}}" placeholder="Email" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure ?')">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js')

@stop
