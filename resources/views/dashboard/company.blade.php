@extends('layouts.dashboard')

@section('title', 'Company Profile')

@section('page-title', 'Company Profile')



@section('dashboard-content')
   <div class="row">
   <div class="col-md-12">
    <div class="post-job box">
      @include('error')
    <h3 class="job-title">Companies <a class="badge badge-pill badge-success float-right" data-toggle="modal" data-target="#addcompany" href="">Add New</a></h3>
    @if(!empty($company))
     
   <div class="inner-box my-resume">
   <div class="author-resume">
   <div class="thumb">
   <img src="assets/img/resume/img-1.png" alt="">
   </div>
   <div class="author-info">
   <h3>{{$company->name}}</h3>
   <p class="sub-title">UI/UX Designer</p>
   <p><span class="address"><i class="lni-map-marker"></i>Mahattan, NYC, USA</span> <span><i class="ti-phone"></i>(+01) 211-123-5678</span></p>
   <div class="social-link">
   <a href="#" class="Twitter"><i class="lni-twitter-filled"></i></a>
   <a href="#" class="facebook"><i class="lni-facebook-filled"></i></a>
   <a href="#" class="google"><i class="lni-google-plus"></i></a>
   <a href="#" class="linkedin"><i class="lni-linkedin-fill"></i></a>
   </div>
   </div>
   </div>
   </div>

    @else
     No cities found !
    @endif
   </div>   
 </div>
   </div>






{{-- Add Company --}}
<div class="modal fade" id="addcompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Company</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form3" class="form-ad" action="/companies" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
                 @csrf
               <div class="form-group">
                 <input id="name" type="text" name="name" class="form-control" placeholder="Company Name" required>
               </div>

               <div class="form-group">
                 <input id="tagline" type="text" name="tagline" class="form-control" placeholder="Company Tagline" >
               </div>

               <div class="form-group">
                 <input id="address" type="text" name="address" class="form-control" placeholder="Address Line" >
               </div>

              <div class="form-group">
              <input id="address" type="text" name="web" class="form-control" placeholder="Website" >
              </div>

               <div class="form-group">
                <label for="">Choose logo</label><br>
               <input type="file" class="" name="logo" id="validatedCustomFile" >
               </div>
               
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <input type="submit"  name="" class="btn btn-primary" value="Save">
      </div> 
    </form>
    </div>
  </div>
</div>

{{-- Edit Company --}}
<div class="modal fade" id="edittype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form4" class="form-ad" action="/companies" method="POST">
      <div class="modal-body">
                 @csrf
               <div class="form-group">
                 <input id="name" type="text" name="name" class="form-control" placeholder="Company Name" required>
               </div>

               <div class="form-group">
                 <input id="tagline" type="text" name="tagline" class="form-control" placeholder="Company Tagline" >
               </div>

               <div class="form-group">
                 <input id="address" type="text" name="address" class="form-control" placeholder="Address Line" >
               </div>

              <div class="form-group">
              <input id="web" type="text" name="web" class="form-control" placeholder="Website" >
              </div>

               <div class="form-group">
                <label for="">Choose logo</label><br>
               <input type="file" class="" name="logo" id="validatedCustomFile" >
               </div>

               
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <input type="submit"  name="" class="btn btn-primary" value="Save changes">
      </div> 
    </form>
    </div>
  </div>
</div>


{{-- Delete type --}}
<div class="modal fade" id="deletetype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form5" class="form-ad" action="/types" method="POST">
                 
                 @method('delete')
                <div class="modal-body">
                 @csrf
               <div class="form-group">
                
               </div>
               
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

        <input type="submit"  name="" class="btn btn-danger" value="Yes">
      </div> 
    </form>
    </div>
  </div>
</div>
@endsection

@section('dashboard-js')

<script type="text/javascript">

      //Edit type
          $('#edittype').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var id = button.data('id')
          var name = button.data('name')
          var modal = $(this)
          modal.find('.modal-body #name').val(name)
          $("#form4").attr('action', 'types/'+id+'/update');
        });

      //for type delete
          $('#deletetype').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var id = button.data('id')
          var modal = $(this)
          $("#form5").attr('action', 'types/'+id+'/delete');
        });
</script>

@endsection


