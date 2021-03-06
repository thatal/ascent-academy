<div class="header py-4">
  <div class="container">
    <div class="d-flex">
      <a class="header-brand" href="#">
        <img src="{{asset('public/images/logo.png')}}" class="header-brand-img" alt="logo">
      </a>
      <div class="d-flex order-lg-2 ml-auto">
        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
            <span class="avatar" style="line-height: 0 !important"><img src="{{url('/public/images/user.png')}}"></span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default">@if(Auth::check()){{Auth::user()->name}}@endif</span>
              <small class="text-muted d-block mt-1">Staff</small>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            
            {{-- <div class="dropdown-divider"></div> --}}
            {{-- <a class="dropdown-item" href="#">
              <i class="dropdown-icon fa fa-unlock"></i> Change Password
            </a> --}}
            <a class="dropdown-item" href="{{route('staff.logout')}}">
              <i class="dropdown-icon fa fa-sign-out"></i> Log out
            </a>
          </div>
        </div>
      </div>
      <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>