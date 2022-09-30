@extends('layouts.default')
@section('title', 'Forgot Password')
@push('styles')
<link rel="stylesheet" href="{{asset('css/pages/lawyer/lawyer-auth.css')}}">
@endpush

@section('content')

<!-- incldue navbar page -->
@include('includes.nav')

<!-- ************* Lawyer forgot password ************** -->

@include('includes.forogt_password', ['entity' => 'admin'])

@stop