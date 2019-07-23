@extends('common.admin-app')
@section('title')
Staff
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
                <h3 class="card-title">Staff List</h3>
              </div>
              <div class="col-auto">
                <a href="{{route('admin.staff.create')}}" class="btn btn-success">Add New</a>
              </div>
            </div>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($staffs as $key => $staff)
                    <tr>
                      <td>{{ $key+ 1 + ($staffs->perPage() * ($staffs->currentPage() - 1)) }}</td>
                      <td>{{ $staff->name }}</td>
                      <td>{{ $staff->username }}</td>
                      <td>
                        <div class="btn-group">
                          <a href="{{ route('admin.staff.edit',$staff->uuid) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                          <a href="{{ route('admin.staff.delete',$staff->uuid) }}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete?');"><i class="fa fa-trash"></i></a>
                        </div>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="10">No Data</td>
                    </tr>
                    @endforelse

                  </tbody>
                </table>
                {{$staffs->render()}}
              </div>
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


