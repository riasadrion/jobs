@extends('layouts.dashboard')

@section('title', 'Post A Job')

@section('css')
	
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{url('/')}}/css/window-date-picker.css">
<link rel="stylesheet" href="{{url('/')}}/css/summernote.css">

@endsection

@section('page-title', 'Post A Job')

@section('dashboard-content')
 
  <div class="post-job box">
  @include('error')
  <h3 class="job-title">Post a new Job</h3>
  <form class="form-ad" action="/jobs" method="POST">
    @csrf
  <div class="form-group">
  <label class="control-label">Job Title</label>
  <input type="text" name="title" class="form-control" placeholder="Write job title" required>
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
  <label class="control-label">Job Categories</span></label>
  <select class="js-example-basic-multiple1 form-control dropdown-product selectpicker" name="category_id" multiple="multiple" required>
    <option value="1">Full Time</option>
    <option value="3">Part Time</option>
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
  </select>
  </div>


  <div class="form-group">
  <label class="control-label">Job Location</span></label>
  <select class="js-example-basic-multiple2 form-control dropdown-product selectpicker" name="category_id" required>
    <option value="">Select Location</option>
    @foreach($locations as $location)
      <option disabled><strong style="color: black !important">{{$location->name}}</strong></option>
      @foreach($location->cities as $city)
      <option value="{{$city->id}}">&nbsp;&nbsp;- {{$city->name}}</option>
      @endforeach
    @endforeach
  </select>
  </div>

  <div class="form-group">
  <label class="control-label">Description</label>
  
  <section id="editor">
  <textarea name="description" id="summernote" style="width: 100%;height: 100px" required>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem quia aut modi fugit, ratione saepe perferendis odio optio repellat dolorum voluptas excepturi possimus similique veritatis nobis. Provident cupiditate delectus, optio?</textarea>
  </section>
  </div>
  <div class="form-group">
  <label class="control-label">Application URL</label>
  <input type="text" name="custom_url" class="form-control" placeholder="Enter an email address or website URL">
  </div>

  <div class="form-group">
    <div id="picker"></div>
  <label class="control-label">Closing Date <span>(optional)</span></label>
  <input type="text" id="demo" name="deadline" class="form-control" placeholder="dd/mm/yyyy" autocomplete="off">
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

@endsection


@section('js')


  <script src="{{url('/')}}/js/window-date-picker.js"></script>


  <script type="text/javascript">
  const picker = new WindowDatePicker({
    el: '#picker',
    toggleEl: '#demo',
    inputEl: '#demo',
    type: 'DATE'
  });
  </script>
	

 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>


    <script type="text/javascript">

    $('.js-example-basic-multiple1').select2();
    $('.js-example-basic-multiple2').select2();

  </script>


  <script src="{{url('/')}}/js/summernote.js"></script>

  <script>
      $('#summernote').summernote({
        height: 250,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                  // set focus to editable area after initializing summernote
      });
    </script>

@endsection