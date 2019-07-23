@extends('common.admin-app')
@section('title')
Fee Head
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
                <h3 class="card-title">Fee Head List</h3>
              </div>
              <div class="col-auto">
                <a href="{{route('admin.fee-head.create')}}" class="btn btn-success">Add New</a>
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
                      <th>Applicable On</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($fee_heads as $key => $fee_head)
                    <tr>
                      <td>{{ $key+ 1 + ($fee_heads->perPage() * ($fee_heads->currentPage() - 1)) }}</td>
                      <td>{{ $fee_head->name }}</td>
                      <td>{{ $fee_head->applicable_on=='1'?'Only at admission time':'On every semester/year' }}</td>
                      <td>
                        <div class="btn-group">
                          <a href="{{ route('admin.fee-head.edit',$fee_head->uuid) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                          <a href="{{ route('admin.fee-head.delete',$fee_head->uuid) }}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete?');"><i class="fa fa-trash"></i></a>
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
                {{$fee_heads->render()}}
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


