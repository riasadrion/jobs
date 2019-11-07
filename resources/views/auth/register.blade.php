@extends('layouts.app')

@section('content')

<section class="section">




    <div class="page-header">
    <div class="container">
    <div class="row">
    <div class="col-lg-12">
    <div class="inner-header">
    <h3>Create Your account</h3>
    </div>
    </div>
    </div>
    </div>
    </div>


    <section id="content" class="section-padding">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-5 col-md-6 col-xs-12">
    <div class="page-login-form box">
    <h3>
    Create Your account
    </h3>
    <form class="login-form" method="POST" action="{{ route('register') }}">
    @csrf
    <input type="hidden"  name="type" value="1" >
    <div class="form-group">
    <div class="input-icon">
    <i class="lni-user"></i>
    <input id="name" type="text" placeholder="Enter your name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

    @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
    </div>
    </div>
    <div class="form-group">
    <div class="input-icon">
    <i class="lni-envelope"></i>
    <input id="email" type="email" placeholder="Enter email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

    @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    </div>
    </div>
    <div class="form-group">
    <div class="input-icon">
    <i class="lni-lock"></i>
    <input id="password" type="password" placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    </div>
    <div class="form-group">
    <div class="input-icon">
    <i class="lni-unlock"></i>
     <input id="password-confirm" placeholder="Confirm password" type="password" class="form-control" name="password_confirmation" required>
    </div>
    </div>
    <button type="submit" class="btn btn-common log-btn mt-3">Register</button>
    <p class="text-center">Already have an account?<a href="/login"> Sign In</a></p>
    </form>
    </div>
    </div>
    </div>
    </div>
    </section>

@endsection
