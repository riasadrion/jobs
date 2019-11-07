@extends('layouts.app')


@section('css')

  <style>
	body { padding-right: 0 !important }
	nav {padding-right: 0 !important }
  </style>

@endsection



@section('content')

</header>

<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>@yield('page-title')</h3>
</div>
</div>
</div>
</div>
</div>


<div id="content">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4 col-xs-12">
<div class="right-sideabr">
<h4>Manage Account</h4>
<ul class="list-item">
<li><a class="{{ (request()->is('dashboard')) ? 'active' : '' }}" href="/dashboard">Dashboard</a></li>
<li><a class="{{ (request()->is('jobs/create')) ? 'active' : '' }}" href="/jobs/create">Create a Job</a></li>
<li><a class="{{ (request()->is('jobs')) ? 'active' : '' }}" href="/jobs">Manage Jobs</a></li>
<li><a class="{{ (request()->is('Companies')) ? 'active' : '' }}" href="/companies">Manage Companies</a></li>
<li><a class="{{ (request()->is('categories')) ? 'active' : '' }}" href="/categories">Manage Categories</a></li>
<li><a class="{{ (request()->is('types')) ? 'active' : '' }}" href="/types">Manage Types</a></li>
<li><a class="{{ (request()->is('locations')) ? 'active' : '' }}" href="/locations">Manage Locations</a></li>
<li><a href="#">My Resume</a></li>
<li><a class="{{ (request()->is('admin/cities')) ? 'active' : '' }}" href="bookmarked.html">Bookmarked Jobs</a></li>
<li><a href="notifications.html">Notifications <span class="notinumber">2</span></a></li>
<li><a href="manage-applications.html">Manage Applications</a></li>
<li><a href="change-password.html">Change Password</a></li>
<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Sign Out</a></li>
</ul>
</div>
</div>

<div class="col-lg-8 col-md-8 col-xs-12">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  @yield('dashboard-content')

</div>

</div>
</div>
</div>
@endsection

@section('js')

@yield('dashboard-js')

@endsection
