@extends('layouts.admin')

@section('content')
   <div class="row">
   <div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Category List</h3>
            @if(count($types)>0)
     <table class="table">
      <tbody>
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>Options</td>
        </tr>
      <?php $i = 1 - $types->perPage(); $skipped = $types->currentPage() * $types->perPage(); ?>
      @foreach($types as $type)

        <tr>
          <td>
              {{ $skipped + $i }}
          </td>
          <td>{{$type->title}}</td>
          <td>
            <a style="font-size: 20px; color: #00b1e7" data-id="{{$type->id}}" href="#" data-title="{{$type->title}}" data-toggle="modal" data-target="#edit" style="font-size: 20px; color: #0049d3"><i class="mdi mdi-square-edit-outline"></i></a>
            <a style="font-size: 20px; color: #f89872" data-toggle="modal" data-id="{{$type->id}}" data-target="#delete" href=""><i class="mdi mdi-delete-outline"></i></a>
          </td>
        </tr>
        <?php $i++; ?> 
      @endforeach

      </tbody>
     </table>
        {{$types->links('vendor.pagination.bootstrap-4')}}
    @else
     No types found !
    @endif
        
        </div>
   </div>   
 </div>

   <div class="col-md-4">
      <div class="card">
      <div class="card-body">
      <h3 class="card-title">Add Job Type</h3>
   	   <form class="form-ad" action="/controller-types" method="POST">
   		     @csrf
   		   <div class="form-group">
   			   <input type="text" name="title" class="form-control" placeholder="Enter Name" required>
   		   </div>
          <input type="submit"  name="" class="btn btn-success" value="Save">
   	   </form>
      </div>
      </div>
   </div>
   </div>

{{-- edit modal --}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form1" class="form-ad" action="" method="POST">
      @method('put')
      <div class="modal-body">
        @csrf
      <div class="form-group">
        <input id="title" type="text" name="title" class="form-control" placeholder="Enter Name" required>
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
      <form id="form2" class="form-ad" action="" method="POST">
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

@section('admin-js')

<script type="text/javascript">
  $('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('id')
    var title = button.data('title')
    var modal = $(this)
    modal.find('.modal-body #title').val(title)
    $("#form1").attr('action', 'controller-types/'+id);
  });

  $('#delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) 
    var id = button.data('id')
    var modal = $(this)
    $("#form2").attr('action', 'controller-types/'+id);
  });
</script>

@endsection