<!doctype html>
<html lang="en" dir="ltr">
<head>

  @include('common/layouts/head')
 
<style>
  .help-block {
    color: red!important;
  }
</style>
</head>
<body class="">
  <div class="se-pre-con"></div>
  <div class="page">
    <div class="page-main">
      @include('staff/layouts/header')
      @include('staff/layouts/navbar')
      <div class="my-3 my-md-5">
        <div class="container">

        
        @include('common/layouts/alert')
            
          <div class="page-header">
            <h1 class="page-title">
              @yield('title')
            </h1>
          </div>
          @yield('content')
        </div>
      </div>
    </div>
  </div>
    @include('common/layouts/footer')
  


@include('common/layouts/js')
@yield('js')
@yield('vuejs')

</body>
</html>