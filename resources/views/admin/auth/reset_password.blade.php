@extends('layouts.default')
@section('title', 'Reset Password')
@push('styles')
<link rel="stylesheet" href="{{asset('css/pages/lawyer/lawyer-auth.css')}}">
@endpush

@section('content')

<!-- incldue navbar page -->
@include('includes.nav')

@include('includes.reset_password', ['action' => route('lawyer.reset.password')] )

@stop