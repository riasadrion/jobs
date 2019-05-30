@extends('layouts.app')


@section('content')

<div class="page-header">
	<div class="container">
		<div class="row">
		<div class="col-lg-8 col-md-6 col-xs-12">
			<div class="breadcrumb-wrapper">
			<div class="img-wrapper">
				<img src="{{url('/')}}/storage/company_logos/{{$job->user->company->logo}}" alt="">
			</div>
			<div class="content">
			<h3 class="product-title">{{$job->title}}</h3>
			<p class="brand">{{$job->user->company->name}}</p>
			<div class="tags">
		  <span><i class="lni-map-marker"></i> {{$job->city->name}}, {{$job->city->location->name}}</span>
		<span><i class="lni-calendar"></i> Posted on {{$job->created_at}}</span>
			</div>
			</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-xs-12">
					@if(!empty($job->salary))
						<div class="month-price">
							<div class="price">
								{{$job->salary}}
							</div>
						</div>
					@else
					<a href="" style="font-size: 15px" class="badge badge-success float-right">Salary Negotiable</a>
					@endif
		</div>
		</div>
	</div>
</div>


<section class="job-detail section">
	<div class="container">
		<div class="row justify-content-between">
		<div class="col-lg-8 col-md-12 col-xs-12">
			<div class="content-area">
			 <h4>Job Description</h4>
             {!! $job->description !!}
			</div><br>
			<a href="#" class="btn btn-common">Apply job</a>
		</div>
		<div class="col-lg-4 col-md-12 col-xs-12">
			<div class="sideber">
			<div class="widghet">
			<h3>Map Location</h3>
			<div class="maps">
				<div id="map" class="map-full">
				{!!$job->map!!}
				</div>
			</div>
			</div>
			<div class="widghet">
				<h3>Share This Job</h3>
				<div class="share-job">
				<form method="post" class="subscribe-form">
				<div class="form-group">
				<input type="email" name="Email" class="form-control" placeholder="https://joburl.com" required="">
				<button type="submit" name="subscribe" class="btn btn-common sub-btn"><i class="lni-files"></i></button>
				<div class="clearfix"></div>
				</div>
				</form>
				<ul class="mt-4 footer-social">
					<li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
					<li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
					<li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
					<li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
				</ul>
				<div class="meta-tag">
					<span class="meta-part"><a href="#"><i class="lni-star"></i> Write a Review</a></span>
					<span class="meta-part"><a href="#"><i class="lni-warning"></i> Reports</a></span>
					<span class="meta-part"><a href="#"><i class="lni-share"></i> Share</a></span>
				</div>
				</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</section>


<section id="featured" class="section bg-gray pb-45">
<div class="container">
<h4 class="small-title text-left">Similar Jobs</h4>
<div class="row">
<div class="col-lg-4 col-md-6 col-xs-12">
<div class="job-featured">
<div class="icon">
<img src="assets/img/features/img1.png" alt="">
</div>
<div class="content">
<h3><a href="job-page.html">Software Engineer</a></h3>
<p class="brand">MizTech</p>
<div class="tags">
<span><i class="lni-map-marker"></i> New York</span>
<span><i class="lni-user"></i>John Smith</span>
</div>
<span class="full-time">Full Time</span>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 col-xs-12">
<div class="job-featured">
<div class="icon">
<img src="assets/img/features/img2.png" alt="">
</div>
<div class="content">
<h3><a href="job-page.html">Graphic Designer</a></h3>
<p class="brand">Hunter Inc.</p>
<div class="tags">
<span><i class="lni-map-marker"></i> New York</span>
<span><i class="lni-user"></i>John Smith</span>
</div>
<span class="part-time">Part Time</span>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 col-xs-12">
<div class="job-featured">
<div class="icon">
<img src="assets/img/features/img3.png" alt="">
</div>
<div class="content">
<h3><a href="job-page.html">Managing Director</a></h3>
<p class="brand">MagNews</p>
<div class="tags">
<span><i class="lni-map-marker"></i> New York</span>
<span><i class="lni-user"></i>John Smith</span>
</div>
<span class="full-time">Full Time</span>
</div>
</div>
</div>
</div>
</div>
</section>

@endsection