@extends('layouts.default')
@section('title', 'Login')
@push('styles')
<link rel="stylesheet" href="{{asset('css/pages/lawyer/lawyer-auth.css')}}">
@endpush


@section('content')

<!-- ************* claim Login ************** -->
<!-- incldue navbar page -->
@include('includes.nav')

<!-- incldue error meesage page -->
@include('includes.error_message')

<div class="row">
    <div class="col-xs-12 col-lg-6 col-lg-offset-3 text-center claim_pswd">
        <h2>Law Firm Dashboard</h2>
        <div class="claim_login">
            <h4>Log In</h4>
            <form action="{{ route('lawyer.login') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    <label for="sra_id">SRA Id</label>
                    <input name="sra_id" type="text" class="form-control" id="sra_id">
                </div>

                @if (Session::has('sra_id_msg'))
                    <div class="alert alert-danger text-dark">SRA id incorrect.</div>
                @endif

                <div class="form-group">
                    <label for="email_address">Email Address</label>
                    <input name="email_address" type="email" class="form-control" id="email_address">
                </div>

                @if (Session::has('sra_id_msg'))
                    <div class="alert alert-danger text-dark">Email address incorrect.</div>
                @endif

                <div class="form-group">
                    <label for="sra_pswd">Password</label>
                    <input name="password" type="password" class="form-control" id="sra_pswd">
                </div>
                
                @if (Session::has('pass_msg'))
                    <div class="alert alert-danger text-dark">Password incorrect.</div>
                @endif

                <button class="login_btn" type="submit">Log In</button>
                <hr>
                <a href="{{ route('lawyer.forgot.password.form') }}" class="forgot_btn" type="">Forgot Password</a>
            </form>
        </div>
    </div>
</div>
@stop