@extends('layouts.default')
@section('title', 'Login')
@push('styles')
<link rel="stylesheet" href="{{asset('css/pages/lawyer/lawyer-auth.css')}}">
@endpush


@section('content')

<!-- ************* claim Login ************** -->
<!-- incldue navbar page -->
@include('includes.nav')

@include('includes.login', ['action' => route('admin.login'), 'forgotRoute' => route('admin.forgot.password')] )

@stop
