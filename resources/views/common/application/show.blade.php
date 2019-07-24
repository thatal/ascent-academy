<div class="card-body">

  <div class="row">
    <table width="100%">
      <tbody>
        <tr class="text-center">
          <td width="20%" class="padding-xs"><img style="max-width: 80;" class="avatar avatar-xxl"  src="{{asset('public/images/logo.jpg')}}"></td>
          <td class="padding-xs">
            <div class="card-body text-center">
              <h3 class="mb-3">DARRANG COLLEGE</h3>
              <p class="mb-4 bold">
                Tezpur, Assam, Sonitpur, Pin-784001<br>HS/DEGREE &amp; PG ADMISSION
              </p>
            </div>
          </td class="padding-xs">
          <td width="20%"  class="padding-xs"><img style="max-width: 80;" class="avatar avatar-xxl" src="{{(strpos($application->passport, '.') !== false) ? asset($application->passport) : asset('public/images/user.png')}}"></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="row">
    <div class="col-md-12 table-responsive">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td class="padding-xs bold" colspan="4">Personal Details</td>
          </tr>
          <tr>
            <td class="padding-xs">Registration Number</td>
            <td class="padding-xs bold">{{$application->student->id}}</td>
            <td class="padding-xs">Permanent&nbsp;Add.</td>
            <td class="padding-xs bold">{{$application->permanent_vill_or_town.', '.$application->permanent_city.', '.$application->permanent_state.', '.$application->permanent_district.', '.$application->present_nationality.', '.$application->permanent_pin}}</td>
          </tr>
          <tr>
            <td class="padding-xs">Full Name</td>
            <td class="padding-xs bold">{{$application->fullname}}</td>
            <td class="padding-xs">Present&nbsp;Add.</td>
            <td class="padding-xs bold">{{$application->present_vill_or_town.', '.$application->present_city.', '.$application->present_state.', '.$application->present_district.', '.$application->present_nationality.', '.$application->present_pin}}</td>
          </tr>
          <tr>
            <td class="padding-xs">Gender</td>
            <td class="padding-xs bold ">{{$application->gender ?? 'N/A'}}</td>
            <td class="padding-xs">Religion</td>
            <td class="padding-xs bold">{{$application->religion ?? 'N/A'}}</td>
          </tr>
          <tr>
            <td class="padding-xs">Date of Birth</td>
            <td class="padding-xs bold">{{$application->dob}}</td>
            <td class="padding-xs">Blood Group</td>
            <td class="padding-xs bold">{{$application->blood_group ?? 'N/A'}}</td>
          </tr>
          <tr>
            <td class="padding-xs">Father's Name</td>
            <td class="padding-xs bold">{{$application->fathers_name ?? 'N/A'}}</td>
            <td class="padding-xs">Mother's Name</td>
            <td class="padding-xs bold">{{$application->mothers_name ?? 'N/A'}}</td>
          </tr>
          <tr>
            <td class="padding-xs">last Board/University</td>
            <td class="padding-xs bold">{{$application->last_board_or_university}} {{$application->last_board_or_university_state ? '('.$application->last_board_or_university_state.')':''}}</td>
            <td class="padding-xs">Year</td>
            <td class="padding-xs bold">{{$application->year}}</td>
          </tr>
          <tr>
            <td class="padding-xs">Caste</td>
            <td class="padding-xs bold">{{$application->caste->name ?? 'N/A'}}</td>
            <td class="padding-xs">Annual Income</td>
            <td class="padding-xs bold">{{$application->annual_income ?? 'N/A'}}</td>
          </tr>
          <tr>
            <td class="padding-xs">Co-Curricular</td>
            <td class="padding-xs bold">
              {{$application->co_curricular==0?'No':'Yes'}}
            </td>
            <td class="padding-xs">Differently Abled</td>
            <td class="padding-xs bold">
              {{$application->differently_abled==0?'No':'Yes'}}
            </td>
          </tr>
          <tr>
            <td class="padding-xs">Contact Number</td>
            <td class="padding-xs bold">{{$application->mobile_no ?? 'N/A'}}</td>
            <td class="padding-xs">E-mail</td>
            <td class="padding-xs bold">{{$application->email ?? 'N/A'}}</td>
          </tr>
          <tr>
            <td class="padding-xs">Last Exam Roll</td>
            <td class="padding-xs bold">{{$application->last_exam_roll ?? 'N/A'}}</td>
            <td class="padding-xs">Last Exam No</td>
            <td class="padding-xs bold">{{$application->last_exam_no ?? 'N/A'}}</td>
          </tr>
          <tr>
            <td class="padding-xs">Total Marks Secured</td>
            <td class="padding-xs bold">{{$application->all_total_marks ?? 'N/A'}}</td>
            <td class="padding-xs">Precentage</td>
            <td class="padding-xs bold">{{$application->percentage ? $application->percentage.'%':'N/A'}}</td>
          </tr>
          <tr>
            <td class="padding-xs">According to Marksheet</td>
            <td class="padding-xs bold">{{$application->total_marks_according_marksheet ?? 'N/A'}}</td>
            <td class="padding-xs">Free Admission</td>
            <td class="padding-xs bold">{{ucwords($application->free_admission ?? 'N/A')}}</td>
          </tr>
          @if(is_new_admission($application->semester_id))
          <tr>
            <td colspan="4">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="padding-xs">Subjects offered in previous examination</td>
                    <td class="padding-xs">Total Marks</td>
                    <td class="padding-xs">Marks Secured</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach(range(1, 6) as $number)
                  <tr>
                    <td class="padding-xs bold">{{$application->{"sub_" . $number . "_name"} }}</td>
                    <td class="padding-xs bold">{{$application->{"sub_" . $number . "_total"} }}</td>
                    <td class="padding-xs bold">{{$application->{"sub_" . $number . "_score"} }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </td>
          </tr>
          @endif
          <tr>
            <td class="padding-xs bold" colspan="4">Application Details</td>
          </tr>
          <tr>
            <td class="padding-xs">Application Number</td>
            <td class="padding-xs">Course</td>
            <td class="padding-xs">Stream</td>
            <td class="padding-xs">Semester</td>
          </tr>
          <tr>
            <td class="padding-xs bold">{{$application->id}}</td>
            <td class="padding-xs bold">{{$application->course->name}}</td>
            <td class="padding-xs bold">{{$application->appliedStream->stream->name}}</td>
            <td class="padding-xs bold">{{$application->semester->name}}</td>
            {{-- <td class="padding-xs">
              @if($preferences)
                @foreach($preferences as $preference)
                  @foreach($preference as $appliedSubject)
                      {{$appliedSubject->subject->name}}
                      @if($appliedSubject->is_major==1)
                      (Major)
                      @elseif($appliedSubject->is_compulsory==1)
                      (Compulsory)
                      @else
                      (Optional)
                      @endif
                      <br>
                  @endforeach
                  <hr>
                @endforeach
              @else
                @foreach($appliedSubjects as $appliedSubject)
                    {{$appliedSubject->subject->name}}
                    <br>
                @endforeach
              @endif
            </td> --}}
          </tr>
          <tr>
              <td colspan="4">
          <table width="100%">
            <tbody>
                  @if(Request::route()->getName() == 'admin.application.show'||Request::route()->getName() == 'student.application.show'||Request::route()->getName() == 'staff.application.show')
                    @if($application->attachments->count())
                    <tr>
                      @forelse($application->attachments as $key => $attachments)
                      <td class="padding-xs">{{$attachments->doc_name}}</td>
                      @empty
                      @php
                      $key=0
                      @endphp
                      @endforelse
                      @for($i=$key;$i<3;$i++)
                      <td class="padding-xs"></td>
                      @endfor
                    </tr>
                    <tr>
                      @forelse($application->attachments as $key => $attachments)
                      <td class="padding-xs">
                        <a href="{{url($attachments->path)}}" target="_blank">View</a>
                      </td>
                      @empty
                      @php
                      $key=0
                      @endphp
                      @endforelse
                      @for($i=$key;$i<3;$i++)
                      <td class="padding-xs"></td>
                      @endfor
                    </tr>
                @endif
              @endif
          </tbody>
              </table></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="float-right">
    <table >
      <tbody>
        <tr>
          <td><img style="width: 160px; height: 60px; max-width: 160px; max-height: 60px;" src="{{(strpos($application->sign, '.') !== false) ? asset($application->sign) : asset('public/images/sign.png')}}"></td>
        </tr>
        <tr>
          <td class="bold">Signature of the Applicant</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div style="clear:both;"></div>
  <div class="row">
    <div class="col">
    <p>For Office use only</p>
    <table class="table full-width table-bordered">
      <tbody>
        <tr>
          <td class="padding-xs bold">Subject Alloted </td>
          <td class="padding-xs bold">UID Alloted</td>
        </tr>
        <tr>
          @if($application->appliedSubjects()->exists())
            <td class="padding-xs">@foreach($application->appliedSubjects as $key => $applied_subject){{$key!=0?'+':''}}{{$applied_subject->subject->abbreviation}}@endforeach </td>
          @else
            <td class="padding-xs bold signature_space"> </td>
          @endif
          @if($application->admittedStudent()->exists())
            <td class="padding-xs">{{$application->admittedStudent->uid}}</td>
          @else
            <td class="padding-xs signature_space"> </td>
          @endif
        </tr>
      </tbody>
    </table>
    </div>
    </div>
    <div style="clear:both;"></div>
    <div class="row">
    <div class="col-12">
    <table class="full-width" style="width:100%; margin-top:20px;">
        <tr>
        <td width="20%">
          <div class="qr_code" style="height:120px;">
<img style="max-width: 200;" height="120" width="120" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($application->id))!!}" />
          </div>
        </td>
        <td width="40%">
          <p>Verified By</p>
          <div class="signature_space" style="height:30px;"></div>
          <p>Date _____________ </p>
        </td>
        <td width="40%" class="text-center">
          <div class="signature_space" style="height:30px;"></div>
          <p>Signature</p>
          <p>Chairman, Admission Committee</p>
        </td>
        </tr>
    </table>
    </div>
  </div>

</div>
