@extends('layouts.dashboard')

@section('title', 'Manage Categories')

@section('page-title', 'Manage Categories')



@section('dashboard-content')
   <div class="row">
   <div class="col-md-6">
    <div class="post-job box">
    <h3 class="job-title">Category List</h3>
     	@if(count($categories)>0)
     <table class="table">
     	<tbody>
     		<tr>
     			<td>#</td>
     			<td>Name</td>
          <td>Options</td>
     		</tr>
      <?php $i = 1 - $categories->perPage(); $skipped = $categories->currentPage() * $categories->perPage(); ?>
      @foreach($categories as $cat)

     		<tr>
     			<td>
            {{ $skipped + $i }}
         </td>
     			<td>{{$cat->name}}</td>
          <td>
            <a data-id="{{$cat->id}}" data-title="{{$cat->name}}" data-toggle="modal" data-target="#edit" style="font-size: 20px; color: #0049d3" href="/categories/{{$cat->id}}/edit"><i class="lni-pencil-alt"></i></a>
            <a style="font-size: 20px; color: #f89872" data-toggle="modal" data-did="{{$cat->id}}" data-target="#delete" href=""><i class="lni-trash"></i></a>
          </td>
     		</tr>
        <?php $i++; ?> 
     	@endforeach

     		


     	</tbody>
     </table>
     		{{$categories->links('vendor.pagination.bootstrap-4')}}
		@else
		 No categories found !
		@endif
   </div>   
 </div>

   <div class="col-md-6">
      <div class="post-job box">
      @include('error')
      <h3 class="job-title">Add New Category</h3>
   	   <form class="form-ad" action="/categories" method="POST">
   		     @csrf
   		   <div class="form-group">
   			   <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
   		   </div>
          <input type="submit"  name="" class="btn btn-common" value="Add">
   	   </form>
      </div>
   </div>
   </div>

{{-- edit modal --}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form1" class="form-ad" action="/categories" method="POST">
                 @method('put')
      <div class="modal-body">
                 @csrf
               <div class="form-group">
                 <input id="id" type="hidden" name="id" >
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
      <form id="form2" class="form-ad" action="/categories" method="POST">
                 @method('delete')
                <div class="modal-body">
                 @csrf
               <div class="form-group">
                 <input id="did" type="hidden" name="did" >
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
  $('#edit').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('id')
  var title = button.data('title')
  
  var modal = $(this)
  modal.find('.modal-body #id').val(id)
  modal.find('.modal-body #title').val(title)
  $("#form1").attr('action', 'categories/'+id);
});


    $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var did = button.data('did')
    var modal = $(this)
    modal.find('.modal-body #id').val(did)
    $("#form2").attr('action', 'categories/'+did);
  });
</script>

@endsection


