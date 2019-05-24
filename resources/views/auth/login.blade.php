@extends('layouts.app')

@section('content')


<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Login</h3>
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
Login
</h3>
<form class="login-form" method="POST" action="{{ route('login') }}">
    @csrf
<div class="form-group">
<div class="input-icon">
<i class="lni-user"></i>
<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

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
<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
@if ($errors->has('password'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
    </span>
@endif
</div>
</div>
<div class="form-group form-check">
<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
<label class="form-check-label" for="exampleCheck1">Keep Me Signed In</label>
 </div>
<button type="submit" class="btn btn-common log-btn">Submit</button>

</form>
<ul class="form-links">
@if (Route::has('password.request'))
<li class="text-center"><a class="float-left" href="{{ route('password.request') }}">Forgot your password?</a><a href="/register" class="float-right">Don't have an account?</a></li>
@endif

</ul>
</div>
</div>
</div>
</div>
</section>

@endsection
