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
                                <h3 class="card-title">Selected Subject Details</h3>
                            </div>
                            @if($application->is_confirmed==0)
                            <div class="col-auto">
                                <a href="{{ route('student.select-subject.confirm',[$application->uuid]) }}"
                                    class="btn btn-success"
                                    onclick="return confirm('Are you sure ? You will not be able to edit afterwards.');">Confirm</a>
                                <a href="{{ route('student.select-subject.edit',[$application->uuid]) }}"
                                    class="btn btn-warning">Edit</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr >
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Abbreviation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($application->appliedSubjects as $key => $appliedSubject)
                                    <tr >
                                        <td class="padding-xs">
                                            {{$key+1}}
                                        </td>
                                        <td class="padding-xs">
                                            {{$appliedSubject->subject->name ?? 'NA'}}
                                        </td>
                                        <td class="padding-xs">
                                            {{$appliedSubject->subject->abbreviation ?? 'NA'}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <div class="d-flex">
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
