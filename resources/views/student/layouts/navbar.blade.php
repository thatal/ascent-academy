<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 ml-auto">
            </div>


            <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">

                    {{-- <li class="nav-item">
          <a href="{{route('student.dashboard.index')}}" class="nav-link">
                    <i class="fe fe-home"></i> Dashboard </a>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link " data-toggle="dropdown"><i
                                class="fe fe-bar-chart"></i> Application</a>

                        <div class="dropdown-menu dropdown-menu-arrow">
                            <a href="{{route('student.application.index')}}" class="dropdown-item">List</a>
                            <a href="{{route('student.application.create')}}" class="dropdown-item">Apply</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
