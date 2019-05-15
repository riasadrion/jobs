@extends('layouts.app')

@section('content')
<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Manage Jobs</h3>
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
<li><a href="resume.html">My Resume</a></li>
<li><a href="bookmarked.html">Bookmarked Jobs</a></li>
<li><a href="notifications.html">Notifications <span class="notinumber">2</span></a></li>
<li><a class="active" href="job-alerts.html">Manage Jobs</a></li>
<li><a href="manage-applications.html">Manage Applications</a></li>
<li><a href="change-password.html">Change Password</a></li>
<li><a href="index.html">Sing Out</a></li>
</ul>
</div>
</div>
<div class="col-lg-8 col-md-8 col-xs-12">
<div class="job-alerts-item candidates">
<h3 class="alerts-title">Manage Jobs</h3>
<div class="alerts-list">
<div class="row">
<div class="col-lg-3 col-md-3 col-xs-12">
<p>Name</p>
</div>
<div class="col-lg-3 col-md-3 col-xs-12">
<p>Keywords</p>
</div>
<div class="col-lg-3 col-md-3 col-xs-12">
<p>Candidates</p>
</div>
<div class="col-lg-3 col-md-3 col-xs-12">
<p>Featured</p>
</div>
</div>
</div>
<div class="alerts-content">
<div class="row">
<div class="col-lg-3 col-md-5 col-xs-12">
<h3>Web Designer</h3>
<span class="location"><i class="lni-map-marker"></i> Manhattan, NYC</span>
</div>
<div class="col-lg-3 col-md-3 col-xs-12">
<p><span class="full-time">Full-Time</span></p>
</div>
<div class="col-lg-3 col-md-2 col-xs-12">
<div class="can-img"><a href="#"><img src="assets/img/jobs/candidates.png" alt=""></a></div>
</div>
<div class="col-lg-3 col-md-2 col-xs-12">
<p><i class="lni-star"></i></p>
</div>
</div>
</div>
<div class="alerts-content">
<div class="row">
<div class="col-lg-3 col-md-5 col-xs-12">
<h3>Web Designer</h3>
<span class="location"><i class="lni-map-marker"></i> Manhattan, NYC</span>
</div>
<div class="col-lg-3 col-md-3 col-xs-12">
<p><span class="full-time">Full-Time</span></p>
</div>
<div class="col-lg-3 col-md-2 col-xs-12">
<div class="can-img"><a href="#"><img src="assets/img/jobs/candidates.png" alt=""></a></div>
</div>
<div class="col-lg-3 col-md-2 col-xs-12">
<p><i class="lni-star"></i></p>
</div>
</div>
</div>
<div class="alerts-content">
<div class="row">
<div class="col-lg-3 col-md-5 col-xs-12">
<h3>Web Designer</h3>
<span class="location"><i class="lni-map-marker"></i> Manhattan, NYC</span>
</div>
<div class="col-lg-3 col-md-3 col-xs-12">
<p><span class="full-time">Full-Time</span></p>
</div>
<div class="col-lg-3 col-md-2 col-xs-12">
<div class="can-img"><a href="#"><img src="assets/img/jobs/candidates.png" alt=""></a></div>
</div>
<div class="col-lg-3 col-md-2 col-xs-12">
<p><i class="lni-star"></i></p>
</div>
</div>
</div>
<div class="alerts-content">
<div class="row">
<div class="col-lg-3 col-md-5 col-xs-12">
<h3>Web Designer</h3>
<span class="location"><i class="lni-map-marker"></i> Manhattan, NYC</span>
</div>
<div class="col-lg-3 col-md-3 col-xs-12">
<p><span class="full-time">Full-Time</span></p>
</div>
<div class="col-lg-3 col-md-2 col-xs-12">
<div class="can-img"><a href="#"><img src="assets/img/jobs/candidates.png" alt=""></a></div>
</div>
<div class="col-lg-3 col-md-2 col-xs-12">
<p><i class="lni-star"></i></p>
</div>
</div>
</div>
<br>

<ul class="pagination">
 <li class="active"><a href="#" class="btn-prev"><i class="lni-angle-left"></i> prev</a></li>
<li><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
<li class="active"><a href="#" class="btn-next">Next <i class="lni-angle-right"></i></a></li>
</ul>

</div>
</div>
</div>
</div>
</div>
@endsection
