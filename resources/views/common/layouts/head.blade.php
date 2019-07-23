<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta http-equiv="Content-Language" content="en" />
<meta name="msapplication-TileColor" content="#2d89ef">
<meta name="theme-color" content="#4188c9">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="csrf-token" content="{{ csrf_token() }}">
@if(auth()->guard('admin')->check())
<meta name="Authorization" content="Bearer {{ Session::get('token') }}">
@endif
<link rel="icon" href="{{asset('public/images/logo.jpg')}}" type="image/jpeg" sizes="32x32"/>
<link rel="shortcut icon" type="image/png" href="{{asset('public/images/logo.jpg')}}"  sizes="32x32"/>
<!-- Generated: 2018-04-16 09:29:05 +0200 -->
<title>{{env('APP_NAME')}}</title>
@include('common/layouts/css')
@yield('css')

