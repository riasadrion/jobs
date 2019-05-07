@extends('layouts.app')


@section('css')
	
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/css/select2.min.css" rel="stylesheet" />




  <link rel="stylesheet" href="https://www.cssscript.com/demo/window-date-time-picker/dist/css/window-date-picker.css">




@endsection

@section('content')

</header>

<div class="page-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="inner-header">
<h3>Post A Job</h3>
</div>
</div>
</div>
</div>
</div>


<section class="section">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-9 col-md-12 col-xs-12">
<div class="post-job box">
<h3 class="job-title">Post a new Job</h3>
<form class="form-ad" action="/jobs" method="POST">
	@csrf
<div class="form-group">
<label class="control-label">Job Title</label>
<input type="text" name="title" class="form-control" placeholder="Write job title" required>
</div>

<div class="form-group">
<label class="control-label">Select location</label>
<div class="search-category-container">
<label class="styled-select">
<select name="location_id" class="dropdown-product selectpicker" required>
<option value="1">Dhaka</option>
<option value="2">Gazipur</option>
</select>
</label>
</div>
</div>


<div class="form-group">
<label class="control-label">Select Employer</label>
<div class="search-category-container">
<label class="styled-select">
<select name="employer_id" class="dropdown-product selectpicker" required>
<option value="1">H&M</option>
<option value="2">MASCO</option>
</select>
</label>
</div>
</div>


<div class="form-group">
<label class="control-label">Select Type</label>
<div class="search-category-container">
<label class="styled-select">
<select name="type" class="dropdown-product selectpicker">
<option value="1">Full Time</option>
<option value="3">Part Time</option>
</select>
</label>
</div>
</div>

<div class="form-group">
<label class="control-label">Job Categories <span>(optional)</span></label>
 <select class="js-example-basic-multiple1 form-control dropdown-product selectpicker" name="tags[]" multiple="multiple">
  <option value="AL">Alabama</option>
  <option value="WY">Wyoming</option>
  <option value="WY">Wyoming</option>
  <option value="WY">Wyoming</option>
  <option value="WY">Wyoming</option>
  <option value="WY">Wyoming</option>
</select>
</div>




<div class="form-group">
<label class="control-label">Description</label>
</div>

<section id="editor">
<textarea name="description" style="width: 100%;height: 100px" required>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem quia aut modi fugit, ratione saepe perferendis odio optio repellat dolorum voluptas excepturi possimus similique veritatis nobis. Provident cupiditate delectus, optio?</textarea>
</section>

<div class="form-group">
<label class="control-label">Application URL</label>
<input type="text" name="custom_url" class="form-control" placeholder="Enter an email address or website URL">
</div>

<div class="form-group">
  <div id="picker"></div>
<label class="control-label">Closing Date <span>(optional)</span></label>
<input type="text" id="demo" name="deadline" class="form-control" placeholder="yyyy-mm-dd">
</div>

<!-- <div class="divider">
<h3 class="job-title">Company Details</h3>
</div>
<div class="form-group">
<label class="control-label">Company Name</label>
<input type="text" class="form-control" placeholder="Enter the name of the company">
</div>
<div class="form-group">
<label class="control-label">Website <span>(optional)</span></label>
<input type="text" class="form-control" placeholder="http://">
</div>
<div class="form-group">
<label class="control-label">Tagline <span>(optional)</span></label>
<input type="text" class="form-control" placeholder="Briefly describe your company">
</div>
<div class="form-group">
<label class="control-label">Tagline <span>(optional)</span></label>
<input type="text" class="form-control" placeholder="Briefly describe your company">
</div> 
<div class="custom-file mb-3">
<input type="file" class="custom-file-input" id="validatedCustomFile" required>
<label class="custom-file-label form-control" for="validatedCustomFile">Choose file...</label>
<div class="invalid-feedback">Example invalid custom file feedback</div>
</div>-->

<input type="submit"  name="" class="btn btn-common" value="Submit Your Job">
</form>
</div>
</div>
</div>
</div>

</section>
@endsection


@section('js')


  <script src="https://www.cssscript.com/demo/window-date-time-picker/dist/js/window-date-picker.js"></script>


  <script type="text/javascript">
  const picker = new WindowDatePicker({
    el: '#picker',
    toggleEl: '#demo',
    inputEl: '#demo',
    type: 'DATE'
  });
  </script>
	

  <script src="{{url('/')}}/js/select2.min.js"></script>


    <script type="text/javascript">

    $('.js-example-basic-multiple1').select2();

  </script>

@endsection