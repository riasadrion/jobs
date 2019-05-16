@extends('layouts.app')

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
<li><a href="/jobs/create">Create a Job</a></li>
<li><a href="#">My Resume</a></li>
<li><a href="bookmarked.html">Bookmarked Jobs</a></li>
<li><a href="notifications.html">Notifications <span class="notinumber">2</span></a></li>
<li><a class="active" href="job-alerts.html">Manage Jobs</a></li>
<li><a href="manage-applications.html">Manage Applications</a></li>
<li><a href="change-password.html">Change Password</a></li>
<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">Sign Out</a></li>
</ul>
</div>
</div>

<div class="col-lg-8 col-md-8 col-xs-12">

  @yield('dashboard-content')

</div>

</div>
</div>
</div>
@endsection