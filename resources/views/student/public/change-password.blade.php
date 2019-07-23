@extends('common.app')
@section('title')
Change password (User)
@endsection

@section('css')
<style>

</style>
@stop

@section('content')

<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form action="{{ route('report-viewer.change-password.post') }}" method="post" class="card">
          {{ csrf_field() }}
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-auto mr-auto">
                <h3 class="card-title">Change Password (Report viewer)</h3>
              </div>
             
            </div>
          </div>
          <div class="card-body">

            <div class="row">
              
              <div class="col-md-4 col-lg-4">
                <div class="form-group">
                  <label class="form-label">Current password</label>

                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 

                  <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter your current password">
                </div>

              </div>


 			<div class="col-md-4 col-lg-4">
                <div class="form-group">
                  <label for="password" class="form-label">New password</label>
				  <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password">
                </div>

              </div>


		   <div class="col-md-4 col-lg-4">
                <div class="form-group">
                  <label for="password_confirmation" class="form-label">Re-enter new password</label>
				  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter your current password">
                </div>

              </div>

             

            </div>


          </div>
          <div class="card-footer text-right">
            <div class="d-flex">
              {{-- <a href="javascript:void(0)" class="btn btn-link">Cancel</a> --}}
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection


@section('js')

@stop