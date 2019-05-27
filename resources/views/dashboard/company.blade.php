@extends('layouts.dashboard')

@section('title', 'Company Profile')

@section('page-title', 'Company Profile')



@section('dashboard-content')
   <div class="row">
   <div class="col-md-12">
    <div class="post-job box">
      @include('error')
    <h3 class="job-title">Company Profile</h3>
    @if(!empty($company))
   <div class="inner-box my-resume">
   <a class="badge badge-pill badge-success float-right" data-id="{{$company->id}}" data-name="{{$company->name}}" data-tagline="{{$company->tagline}}" data-address="{{$company->address}}" data-web="{{$company->web}}" data-logo="{{$company->logo}}" data-toggle="modal" data-target="#editcompany" href="">Update Profile</a>
     <div class="author-resume">
       <div class="thumb">
       <img width="50" src="{{url('/')}}/storage/company_logos/{{$company->logo}}" alt="">
       </div>
         <div class="author-info">
         <h3>{{$company->name}}</h3>
         <p class="sub-title">{{$company->tagline}}</p>
         <p><span class="address"><i class="lni-map-marker"></i>{{$company->address}}</p>
         <p><span class="address"><i class="lni-map-web"></i>{{$company->web}}</p>
         <!-- <div class="social-link">
         <a href="#" class="Twitter"><i class="lni-twitter-filled"></i></a>
         <a href="#" class="facebook"><i class="lni-facebook-filled"></i></a>
         <a href="#" class="google"><i class="lni-google-plus"></i></a>
         <a href="#" class="linkedin"><i class="lni-linkedin-fill"></i></a>
         </div> -->
       </div>
     </div>
   </div>

    @else
    <a class="badge badge-pill badge-success float-right" data-toggle="modal" data-target="#addcompany" href="">Add Information</a>
     Looks empty! Please add company profile.
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
<div class="modal fade" id="editcompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form4" class="form-ad" action="/companies" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
                 @csrf
                 @method('PUT')
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

              <img id="showlogo" height="30" src="" alt=""><br>
              
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

      //Edit Company
          $('#editcompany').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var id = button.data('id')
          var name = button.data('name')
          var tagline = button.data('tagline')
          var address = button.data('address')
          var web = button.data('web')
          var logo = button.data('logo')
          var modal = $(this)
          modal.find('.modal-body #name').val(name)
          modal.find('.modal-body #tagline').val(tagline)
          modal.find('.modal-body #address').val(address)
          modal.find('.modal-body #web').val(web)
          $("#showlogo").attr('src', '/storage/company_logos/'+logo);
          $("#form4").attr('action', 'companies/'+id);
        });

      //delete Company
          $('#deletetype').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var id = button.data('id')
          var modal = $(this)
          $("#showlogo").attr('src', 'companies/'+id);
          $("#form5").attr('action', 'types/'+id+'/delete');
        });
</script>

@endsection


