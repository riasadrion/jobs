@extends('layouts.dashboard')

@section('title', 'Manage Locations')

@section('page-title', 'Manage Locations')



@section('dashboard-content')
   <div class="row">
   <div class="col-md-6">
    <div class="post-job box">
    <h3 class="job-title">States</h3>
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
            <a style="font-size: 20px; color: #26ae61" data-toggle="modal" data-loc_name="{{$loc->name}}" data-loc_id="{{$loc->id}}" data-target="#addcity" href=""><i class="lni-plus"></i></a>
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
    <h3 class="job-title">Cities</h3>
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
            <a style="font-size: 20px; color: #26ae61" data-toggle="modal" data-loc_name="{{$loc->name}}" data-loc_id="{{$loc->id}}" data-target="#addcity" href=""><i class="lni-plus"></i></a>
            <a data-id="{{$loc->id}}" data-title="{{$loc->name}}" data-toggle="modal" data-target="#edit" style="font-size: 20px; color: #0049d3" href="/locations/{{$loc->id}}/edit"><i class="lni-pencil-alt"></i></a>
            <a style="font-size: 20px; color: #f89872" data-toggle="modal" data-id="{{$loc->id}}" data-target="#delete" href=""><i class="lni-trash"></i></a>
          </td>
        </tr>
        <?php $i++; ?> 
      @endforeach

        


      </tbody>
     </table>
        {{$cities->links('vendor.pagination.bootstrap-4')}}
    @else
     No locations found !
    @endif
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
        <h5 class="modal-title" id="exampleModalLongTitle">Add City to <span id="loc_name"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form3" class="form-ad" action="/cities/store" method="POST">
      <div class="modal-body">
                 @csrf
               <div class="form-group">
                 <input id="loc_id" type="hidden" name="loc_id" required>
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

  //add city
      $('#addcity').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var loc_id = button.data('loc_id')
      var loc_name = button.data('loc_name')
      var modal = $(this)
      modal.find('.modal-body #loc_id').val(loc_id)
      modal.find('.modal-title #loc_name').html(loc_name)
    });
</script>

@endsection


