@extends('layouts.dashboard')

@section('title', 'Manage Locations')

@section('page-title', 'Manage Locations')



@section('dashboard-content')
   <div class="row">
   <div class="col-md-6">
    <div class="post-job box">
    <h3 class="job-title">States <a class="badge badge-pill badge-success float-right" data-toggle="modal" data-target="#addstate" href="">Add New</a></h3>
     	@if(count($locations)>0)
     <table class="table">
     	<tbody>
     		<tr>
     			<td>#</td>
     			<td>Name</td>
          <td>Options</td>
     		</tr>
      <?php $i = 1 - $locations->perPage(); $skipped = $locations->currentPage() * $locations->perPage(); ?>
      @foreach($locations as $loc)

     		<tr>
     			<td>
            {{ $skipped + $i }}
         </td>
     			<td>{{$loc->name}}</td>
          <td>

            <a data-id="{{$loc->id}}" data-title="{{$loc->name}}" data-toggle="modal" data-target="#edit" style="font-size: 20px; color: #0049d3" href="/locations/{{$loc->id}}/edit"><i class="lni-pencil-alt"></i></a>
            <a style="font-size: 20px; color: #f89872" data-toggle="modal" data-id="{{$loc->id}}" data-target="#delete" href=""><i class="lni-trash"></i></a>
          </td>
     		</tr>
        <?php $i++; ?> 
     	@endforeach

     		


     	</tbody>
     </table>
     		{{$locations->links('vendor.pagination.bootstrap-4')}}
		@else
		 No locations found !
		@endif
   </div>   
 </div>

   <div class="col-md-6">
    <div class="post-job box">
    <h3 class="job-title">Cities <a class="badge badge-pill badge-success float-right" data-toggle="modal" data-target="#addcity" href="">Add New</a></h3>
      @if(count($cities)>0)
     <table class="table">
      <tbody>
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>State</td>
          <td>Options</td>
        </tr>
      <?php $i = 1 - $cities->perPage(); $skipped = $cities->currentPage() * $cities->perPage(); ?>
      @foreach($cities as $city)

        <tr>
          <td>
            {{ $skipped + $i }}
         </td>
          <td>{{$city->name}}</td>
          <td>{{$city->location->name}}</td>
          <td>



            <a data-id="{{$city->id}}" data-loc_id="{{$city->location->id}}" data-loc_name="{{$city->location->name}}" data-name="{{$city->name}}" data-toggle="modal" data-target="#editcity" style="font-size: 20px; color: #0049d3" href="/cities/{{$city->id}}/edit"><i class="lni-pencil-alt"></i></a>


            <a style="font-size: 20px; color: #f89872" data-toggle="modal" data-id="{{$city->id}}" data-target="#deletecity" href=""><i class="lni-trash"></i></a>
          </td>
        </tr>
        <?php $i++; ?> 
      @endforeach

        


      </tbody>
     </table>
        {{$cities->links('vendor.pagination.bootstrap-4')}}
    @else
     No cities found !
    @endif
   </div>   
 </div>
   </div>

   {{-- Add State --}}
   <div class="modal fade" id="addstate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLongTitle">Add State</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form class="form-ad" action="/locations" method="POST">
         <div class="modal-body">
                    @csrf
                  <div class="form-group">
                    <input id="name" type="text" name="name" class="form-control" placeholder="Enter Name" required>
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




{{-- edit modal --}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update State</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form1" class="form-ad" action="/locations" method="POST">
                 @method('put')
      <div class="modal-body">
                 @csrf
               <div class="form-group">
                 <input id="title" type="text" name="name" class="form-control" placeholder="Enter Name" required>
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


{{-- Add city --}}
<div class="modal fade" id="addcity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form3" class="form-ad" action="/cities/store" method="POST">
      <div class="modal-body">
                 @csrf
                 <div class="form-group">   
                  <select class="form-control"  name="loc_id" required>                 
                    <option value="">Select State</option>
                     @foreach($locations as $location)
                        <option value="{{$location->id}}">{{$location->name}}</option>
                     @endforeach
                   </select></br>
                 </div>
               <div class="form-group">
                 <input id="name" type="text" name="name" class="form-control" placeholder="Enter Name" required>
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

{{-- Edit city --}}
<div class="modal fade" id="editcity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form4" class="form-ad" action="/cities/" method="POST">
      <div class="modal-body">
                 @csrf
               <div class="form-group">
                 <input id="id" type="hidden" name="id" required>
                 <select name="state" id="state" class="form-control" required>
                   
                  <option id="soption" value="" selected></option>
                   @foreach($locations as $location)
                      <option value="{{$location->id}}">{{$location->name}}</option>
                   @endforeach
                 </select></br>
                 <input id="name" type="text" name="name" class="form-control" placeholder="Enter Name" required>
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

{{-- Delete modal --}}
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form2" class="form-ad" action="/locations" method="POST">
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

{{-- Delete City --}}
<div class="modal fade" id="deletecity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form5" class="form-ad" action="/cities" method="POST">
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

  //for state edit
  $('#edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('id')
  var title = button.data('title')
  
  var modal = $(this)
  modal.find('.modal-body #title').val(title)
  $("#form1").attr('action', 'locations/'+id);
});

//for state delete
    $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('id')
    var modal = $(this)
    $("#form2").attr('action', 'locations/'+id);
  });

      //Edit city
          $('#editcity').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var id = button.data('id')
          var name = button.data('name')
          var loc_id = button.data('loc_id')
          var loc_name = button.data('loc_name')
          var modal = $(this)
          modal.find('.modal-body #id').val(id)
          modal.find('.modal-body #name').val(name)
          modal.find('.modal-body #soption').val(loc_id)
          modal.find('.modal-body #soption').html(loc_name)
          $("#form4").attr('action', 'cities/'+id+'/update');
        });

      //for city delete
          $('#deletecity').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) 
          var id = button.data('id')
          var modal = $(this)
          $("#form5").attr('action', 'cities/'+id+'/delete');
        });
</script>

@endsection


