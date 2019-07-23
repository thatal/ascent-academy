<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 ml-auto">
      </div>

      
      <div class="col-lg order-lg-first">
        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">

        <li class="nav-item">
          <a 
          href="{{route('admin.dashboard.index')}}" 
          class="nav-link">
          <i class="fe fe-home"></i> Home </a>
        </li>

        <li class="nav-item dropdown">
          <a href="javascript:void(0)" class="nav-link " data-toggle="dropdown"><i class="fe fe-bar-chart"></i> Master</a>

          <div class="dropdown-menu dropdown-menu-arrow">
            <a href="{{route('admin.fee-head.index')}}" class="dropdown-item">Fee Head</a>

            <a href="{{route('admin.fee.index')}}" class="dropdown-item">Fee</a>
            <a href="{{route('admin.staff.index')}}" class="dropdown-item">Staff</a>
          </div>
        </li>

        <li class="nav-item">
          <a 
          href="{{route('admin.application.index',['limit'=>100])}}" 
          class="nav-link">
          <i class="fe fe-book"></i> Application </a>
        </li>

        <li class="nav-item dropdown">
          <a href="javascript:void(0)" class="nav-link " data-toggle="dropdown"><i class="fe fe-bar-chart"></i> Report</a>

          <div class="dropdown-menu dropdown-menu-arrow">
            <a href="{{route('admin.report.application-fees-collection.index')}}" class="dropdown-item">Application Fee Collection</a>

          </div>
        </li>
        <li class="nav-item">
        <a href="{{route('admin.application.i-card')}}" class="nav-link "><i class="fe fe-bar-chart"></i> I-Card</a>
         </li> 

      </ul>
    </div>
  </div>
</div>
</div>