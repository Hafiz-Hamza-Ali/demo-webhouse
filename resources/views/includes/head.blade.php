<meta charset="utf-8">
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Web-House - @yield('title')</title>
<link rel="icon" href="{{ asset('/images/favicon-32x32.png') }}" type="image/x-icon">
<!-- css -->
<link href="{{asset('plugins/fontawesome-free/css/all.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" id="bootstrap-css">
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
@stack('styles')
<input type="hidden" name="base_url" value="{{ url('') }}" />
<input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />