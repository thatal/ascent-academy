<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 ml-auto">
      </div>

      
      <div class="col-lg order-lg-first">
        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">

        <li class="nav-item">
          <a 
          href="{{route('staff.dashboard.index')}}" 
          class="nav-link">
          <i class="fe fe-home"></i> Home </a>
        </li>

        <li class="nav-item">
          <a 
          href="{{route('staff.application.index',['limit'=>100])}}" 
          class="nav-link">
          <i class="fe fe-book"></i> Application </a>
        </li>
        <li class="nav-item">
        <a href="{{route('staff.application.i-card')}}" class="nav-link "><i class="fe fe-bar-chart"></i> I-Card</a>
         </li>

      </ul>
    </div>
  </div>
</div>
</div>