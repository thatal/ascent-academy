@extends('common.student-app')
@section('title')
Application
@endsection

@section('css')
<style>
  .pull-right {
    float: right!important;
  }
  .margin {
    margin-left: 40px;
  }
  .error{
    color: #ff0000;
  }
  .Zebra_DatePicker_Icon_Wrapper{
    width: 100% !important;
  }
</style>
@stop




@section('content')

<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          {{ csrf_field() }}
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-auto mr-auto">
                <h3 class="card-title">Application</h3>
              </div>
            </div>
          </div>
          <form name="application" id="application" method="post" action="{{route('student.application.store')}}"  enctype="multipart/form-data">
            <div class="card-body">
              @csrf
              
              @include('common/application/form')
              {{-- <div class="row">
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Full Name<span class="form-required">*</span></label>
                    <input type="text" class="form-control" name="fullname" placeholder="Full Name" autocomplete="off" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Date of Birth<span class="form-required">*</span></label>
                    <input type="text" name="dob" id="dob" class="form-control" placeholder="Date of Birth" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Gender<span class="form-required">*</span></label>
                    <label class="radio-inline"><input type="radio" name="gender" id="male" value="Male" checked required> Male</label>
                    <label class="radio-inline"><input type="radio" name="gender" id="Female" value="female" required> Female</label>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Father's Name<span class="form-required">*</span></label>
                    <input type="text" name="fathers_name" class="form-control" placeholder="Father's Name" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Mother's Name<span class="form-required">*</span></label>
                    <input type="text" name="mothers_name" class="form-control" placeholder="Mother's Name" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Religion<span class="form-required">*</span></label>
                    <label class="radio-inline"><input type="radio" name="religion" value="Hindu" checked required> Hindu</label>
                    <label class="radio-inline"><input type="radio" name="religion" value="Muslim" required> Muslim</label>
                    <label class="radio-inline"><input type="radio" name="religion" value="Christianity" required> Christianity</label>
                    <label class="radio-inline"><input type="radio" name="religion" value="Buddhism" required> Buddhism</label>
                    <label class="radio-inline"><input type="radio" name="religion" value="Others" required> Others</label>
                  </div>
                </div>
                
                <div class="col-md-6 col-lg-6">
                  <label>Present Address</label>
                  <div class="form-group">
                    <label class="form-label">Village / Town<span class="form-required">*</span></label>
                    <input type="text" name="present_vill_or_town" class="form-control" placeholder="Nationality" required>
                  </div>
                </div> 
                <div class="col-md-6 col-lg-6">
                  <label>Permanent Address</label>
                  <label><input type="checkbox" name="same"> Same as present address </label>
                  <div class="form-group">
                    <label class="form-label">Village / Town<span class="form-required">*</span></label>
                    <input type="text" name="permanent_vill_or_town" class="form-control" placeholder="Nationality" required>
                  </div>
                </div> 
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">City<span class="form-required">*</span></label>
                    <input type="text" name="present_city" class="form-control" placeholder="City" required>
                  </div>
                </div> 
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">City<span class="form-required">*</span></label>
                    <input type="text" name="permanent_city" class="form-control" placeholder="City" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">State<span class="form-required">*</span></label>
                    <input type="text" name="present_state" class="form-control" placeholder="State" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">State<span class="form-required">*</span></label>
                    <input type="text" name="permanent_state" class="form-control" placeholder="State" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">District<span class="form-required">*</span></label>
                    <input type="text" name="present_district" class="form-control" placeholder="District" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">District<span class="form-required">*</span></label>
                    <input type="text" name="permanent_district" class="form-control" placeholder="District" required>
                  </div>
                </div> 
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Pin<span class="form-required">*</span></label>
                    <input type="text" name="present_pin" class="form-control" placeholder="Pin" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Pin<span class="form-required">*</span></label>
                    <input type="text" name="permanent_pin" class="form-control" placeholder="Pin" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Nationality<span class="form-required">*</span></label>
                    <input type="text" name="present_nationality" class="form-control" placeholder="Nationality" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Nationality<span class="form-required">*</span></label>
                    <input type="text" name="permanent_nationality" class="form-control" placeholder="Nationality" required>
                  </div>
                </div>

                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Annual Income<span class="form-required">*</span></label>
                    <input type="number" name="annual_income" class="form-control" placeholder="Annual Income" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Blood Group</label>
                    <select name="blood_group" class="form-control" required>
                      <option value="">Select Blood Group</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Last Board/University<span class="form-required">*</span></label>
                    <input type="text" name="last_board_or_university" class="form-control" placeholder="Last Board/University" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Last Exam Roll<span class="form-required">*</span></label>
                    <input type="text" name="last_exam_roll" class="form-control" placeholder="Last Exam Roll" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Last Exam No<span class="form-required">*</span></label>
                    <input type="text" name="last_exam_no" class="form-control" placeholder="Last Exam No" required>
                  </div>
                </div>
                <div class="col-md-12 col-lg-12">
                  <div class="form-group">
                    <label class="form-label">Marks<span class="form-required">*</span></label>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th colspan="10">
                            <label><input type="radio" name="marks_type" id="type_percentage" checked> Percentage</label><br>
                            <label><input type="radio" name="marks_type" id="type_cgpa"> CGPA</label>
                          </th>
                        </tr>
                        <tr>
                          <th>Subjects offered in previous examination</th>
                          <th>Total Marks</th>
                          <th>Marks Secured</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(range(1, 6) as $number)
                        <tr>
                          <td><input type="text" class="form-control" name="sub_{{$number}}_name" required="true"></td>
                          <td><input type="text" class="form-control total_marks" name="sub_{{$number}}_total" value="100" readonly required="true"></td>
                          <td><input type="text" class="form-control cell total_score" name="sub_{{$number}}_score" required="true" onkeyup="this.value=this.value.replace(/[^0-9 . -]/g,'')"></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Total Marks<span class="form-required">*</span></label>
                    <input type="input" class="form-control" name="all_total_marks" id="all_total_marks" value="" required readonly>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Percentage<span class="form-required">*</span></label>
                    <input type="text" class="form-control" name="percentage" id="percentage" placeholder="Total Marks" value="" readonly>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Passport Photo<span class="form-required">*</span></label>
                    <input type="file" name="passport" value="" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Signature<span class="form-required">*</span></label>
                    <input type="file" name="sign" value="" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Marksheet<span class="form-required">*</span></label>
                    <input type="file" name="marksheet" value="" required>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Pass Certificate</label>
                    <input type="file" name="pass_certificate" value="">
                  </div>
                </div>
                <div class="col-md-6 col-lg-6">
                  <div class="form-group">
                    <label class="form-label">Caste Certificate</label>
                    <input type="file" name="caste_certificate" value="">
                  </div>
                </div>
                

              </div> --}}

            </div>
            <div class="card-footer text-right">
              <div class="d-flex">
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection


@section('js')
@include('common/application/js')


@stop