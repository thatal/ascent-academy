<table class="table table-bordered" id="myTable">
  <thead>
    <tr>
      <th>#</th>
      <th>Application ID</th>
      <th>Registration ID</th>
      <th>Fullname</th>
      <th>Father's Name</th>
      <th>Course</th>
      <th>Semester</th>
      <th>Stream</th>
      <th>Caste</th>
      {{-- <th>Co Curricular</th> --}}
      {{-- <th>Differently Abled</th> --}}
      <th>Board</th>
      <th>Total Marks</th>
      <th>Percentage</th>
    </tr>
  </thead>
  <tbody>
    @forelse($applications as $key => $application)
    <tr>
      <td>{{ $key+ 1 }}</td>
      <td>{{ $application->id }}</td>
      <td>{{ $application->student->id }}</td>
      <td>{{ $application->fullname }}</td>
      <td>{{ $application->fathers_name }}</td>
      <td>{{ $application->course->name ?? '' }}</td>
      <td>{{ $application->semester->name ?? '' }}</td>
      <td>{{ $application->appliedStream->stream->name }}</td>
      <td>{{ $application->caste->name }}</td>
      {{-- <td>
        @if($application->co_curricular==1)Yes @else No @endif
      </td> --}}
      {{-- <td>
        @if($application->differently_abled==1)Yes @else No @endif
      </td> --}}
      <td>{{ $application->last_board_or_university }} ({{$application->last_board_or_university_state}})</td>
      <td>{{ $application->all_total_marks }}</td>
      <td>{{ $application->percentage }}%</td>

    </tr>
    @empty
    <tr>
      <td colspan="10">No Data</td>
    </tr>
    @endforelse

  </tbody>
</table>
