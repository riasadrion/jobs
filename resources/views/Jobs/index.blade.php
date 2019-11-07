@extends('layouts.dashboard')

@section('title', 'Manage Jobs')

@section('page-title', 'Manage Jobs')

@section('dashboard-content')

  <div class="job-alerts-item candidates">
  <div class="alerts-list">
  <div class="row">
  <div class="col-lg-3 col-md-3 col-xs-12">
  <p>Name</p>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
  <p>Type</p>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
  <p>Candidates</p>
  </div>
  <div class="col-lg-3 col-md-3 col-xs-12">
  <p>Featured</p>
  </div>
  </div>

  </div>

  @if(count($jobs)>0)
   @foreach($jobs as $job)
   <div class="alerts-content">
   <div class="row">
   <div class="col-lg-3 col-md-5 col-xs-12">
   <h3><a href="/jobs/{{$job->id}}">{{$job->title}}</h3></a>
   <span class="location"><i class="lni-map-marker"></i>{{$job->city->name}}, {{$job->city->location->name}}</span>
   </div>
   <div class="col-lg-3 col-md-3 col-xs-12">
   <p><span class="full-time">{{$job->type->name}}</span></p>
   </div>
   <div class="col-lg-3 col-md-2 col-xs-12">
   <div class="can-img"><a href="#"><img src="assets/img/jobs/candidates.png" alt=""></a></div>
   </div>
   <div class="col-lg-3 col-md-2 col-xs-12">
   <p><i class="lni-star"></i></p>
   </div>
   </div>
   </div>

   @endforeach
    {{$jobs->links()}}
  @else
   No jobs found !
  @endif

  </div>
  
@endsection