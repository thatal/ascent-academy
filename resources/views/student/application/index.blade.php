@extends('common.student-app')
@section('title')
Application
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
                                <h3 class="card-title">Application List</h3>
                            </div>
                            <div class="col-auto">
                                {{-- @if(auth()->user()->admittedStudent()->exists())
                                UID : {{auth()->user()->admittedStudent->uid}}
                                @endif --}}
                                @if(auth()->user()->application()->count() < 2)
                                    @if(config('constants.current_time') >= strtotime(config('constants.apply_up_time')) &&
                                    config('constants.current_time') <= strtotime(config('constants.apply_down_time')))
                                        @if($applications->count())
                                        @if(!in_array($applications[0]->semester_id,[2,4,5,6,7,8]))
                                        <a href="{{route('student.application.create')}}" class="btn btn-primary">Apply</a>
                                        @endif
                                        @else
                                        <a href="{{route('student.application.create')}}" class="btn btn-primary">Apply</a>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                    @include('student/application/list')
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('js')

@stop
