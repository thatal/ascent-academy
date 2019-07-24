<div class="my-3 my-md-5">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-auto mr-auto">
                <h3 class="card-title">Fees</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            @if($fee)
            <p class="alert alert-primary">Fee Structure for {{$application->course->name}} {{$application->appliedStream->stream->name}} {{$application->semester->name}} {{$application->gender}} {{$application->with_practical==1?'With Practical':'Without Practical'}} {{$application->free_admission=='yes'?'Free Admission':''}}</p>
            @endif
            <form name="application" id="application" method="post" action="{{ auth()->guard('admin')->check()? route('admin.admission.store',$application->uuid): route('staff.admission.store',$application->uuid) }}">
              @csrf
              @forelse($fee_structures as $key => $fee_structure)
              <div class="row fee-row">
                <div class="{{$application->free_admission=='yes'?'col-4':'col-6'}} head-name">
                  <p>{{$fee_structure->feeHead->name}} </p>
                </div>
                <div class="{{$application->free_admission=='yes'?'col-4':'col-6'}} div-amount">
                  <p>
                    <input type="hidden" name="fee_ids[{{$key}}]" value="{{$fee_structure->fee_id}}">
                    <input type="hidden" name="fee_head_ids[{{$key}}]" value="{{$fee_structure->fee_head_id}}">
                    <input type="hidden" name="is_frees[{{$key}}]" value="{{$application->free_admission=='yes'?(($fee_structure->is_free==1)?1:0):0}}" class="form-control" required>
                    @if($application->free_admission=='yes')
                      @if(in_array($fee_structure->fee_head_id, $self_ids))
                        <input type="number" name="free_amounts[{{$key}}]" value="0" class="form-control amount text-right" {{$application->free_admission=='yes'?'':''}} required>
                      @else
                        <input type="number" name="free_amounts[{{$key}}]" value="{{$fee_structure->amount}}" class="form-control amount text-right" {{$application->free_admission=='yes'?'':''}} required>
                      @endif
                    @else
                    <input type="number" name="amounts[{{$key}}]" value="{{$fee_structure->amount}}" class="form-control amount text-right" {{$application->free_admission=='yes'?'':''}} required >
                    @endif
                  </p>
                </div>
                <div class="{{$application->free_admission=='yes'?'col-4':'col-6'}}">
                  @if($application->free_admission=='yes')
                  <p>
                    <input type="number" name="amounts[{{$key}}]" value="{{(($fee_structure->is_free==1)?0:$fee_structure->amount)}}" class="form-control free-amount text-right" required >
                  </p>
                  @endif
                </div>
              </div>
              @empty
              <p class="alert alert-warning">No Fee Structure created for {{$application->course->name}} {{$application->appliedStream->stream->name}} {{$application->semester->name}} {{$application->gender}} {{$application->with_practical==1?'With Practical':'Without Practical'}} {{$application->free_admission=='yes'?'Free Admission':''}}</p>
              @endforelse
              @if($fee)
              <div class="row">
                <div class="{{$application->free_admission=='yes'?'col-4':'col-6'}}">
                  <p>Total </p>
                </div>
                <div class="{{$application->free_admission=='yes'?'col-4':'col-6'}}">
                  <p>
                    <input type="number" name="total" class="form-control text-right" id="total_amount">
                  </p>
                </div>
                <div class="{{$application->free_admission=='yes'?'col-4':'col-6'}}">
                  @if($application->free_admission=='yes')
                  <p>
                    <input type="number" name="free_total"  class="form-control text-right"  required id="free_total">
                  </p>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>Transaction ID (if available)</p>
                </div>
                <div class="col-6">
                  <p>
                    <input type="text" name="transaction_id" class="form-control" placeholder="Transaction ID">
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <p>Payment Method </p>
                </div>
                <div class="col-6">
                  <p>
                    <select name="pay_method" class="form-control" required="">
                      <option value="">Select Payment Method</option>
                      <option value="Cash">Cash</option>
                      <option value="Card">Card</option>
                    </select>
                  </p>
                </div>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Proceed</button>
              </div>
              @endif
            </form>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-auto mr-auto">
                <h3 class="card-title">Application Details</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <p>Fullname:</p>
              </div>
              <div class="col-6">
                <p>{{$application->fullname}} </p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p>Course:</p>
              </div>
              <div class="col-6">
                <p>{{$application->course->name}} </p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p>Semester:</p>
              </div>
              <div class="col-6">
                <p>{{$application->semester->name}} </p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p>Stream:</p>
              </div>
              <div class="col-6">
                <p>{{$application->appliedStream->stream->name}} </p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p>Caste:</p>
              </div>
              <div class="col-6">
                <p>{{$application->caste->name}} </p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p>Religion:</p>
              </div>
              <div class="col-6">
                <p>{{$application->religion}} </p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p>Co-Curricular:</p>
              </div>
              <div class="col-6">
                <p>{{$application->co_curricular==0?'No':'Yes'}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p>Differently Abled:</p>
              </div>
              <div class="col-6">
                <p>{{$application->differently_abled==0?'No':'Yes'}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p>Free Admission:</p>
              </div>
              <div class="col-6">
                <p>{{$application->free_admission==0?'No':'Yes'}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <p>Practical:</p>
              </div>
              <div class="col-6">
                <p>{{$application->with_practical==0?'No':'Yes'}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
