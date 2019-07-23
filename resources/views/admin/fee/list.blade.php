<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Course</th>
      <th>Semester</th>
      <th>Stream</th>
      <th>Gender</th>
      <th>Practical</th>
      <th>Financial Year</th>
      <th>Year</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse($fees as $key => $fee)
    <tr>
      <td>{{ $key+ 1 }}</td>
      <td>{{ $fee->course->name }}</td>
      <td>{{ $fee->semester->name }}</td>
      <td>{{ $fee->stream->name }}</td>
      <td>{{ $fee->gender }}</td>
      <td>{{ $fee->practical==1?'Yes':'No' }}</td>
      <td>{{ $fee->financial_year}}</td>
      <td>{{ $fee->year}}</td>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#feeStructureModel{{$key}}"><i class="fa fa-eye"></i></button>
          <!-- The Fee Structure Modal -->
          <div class="modal" id="feeStructureModel{{$key}}">
            <div class="modal-dialog">
                @csrf
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Fee Structure</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-6">
                        <p><b>Fee Head</b> </p>
                      </div>
                      <div class="col-6">
                        <p><b>Amount</b> </p>
                      </div>
                    </div>
                    @php
                    $total = 0;
                    @endphp
                    @forelse($fee->feeStructures as $fee_structure)
                    @php
                    $total+=$fee_structure->amount;
                    @endphp
                    <div class="row">
                      <div class="col-6">
                        <p>{{ $fee_structure->feeHead->name }}</p>
                      </div>
                      <div class="col-6">
                        <p>{{ $fee_structure->amount }}</p>
                      </div>
                    </div>
                    @empty
                    <div class="row">
                      <div class="col-6">
                        <p></p>
                      </div>
                      <div class="col-6">
                        <p></p>
                      </div>
                    </div>
                    @endforelse
                    <div class="row">
                      <div class="col-6">
                        <p>Total</p>
                      </div>
                      <div class="col-6">
                        <p>{{ $total }}</p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <!-- /The Fee Structure Modal -->
          <a href="{{ route('admin.fee.edit',$fee->uuid) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
          <a href="{{ route('admin.fee.delete',$fee->uuid) }}" class="btn btn-danger" onclick="return confirm('Are you sure to Delete?');"><i class="fa fa-trash"></i></a>
        </div>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="11">No Data</td>
    </tr>
    @endforelse

  </tbody>
</table>