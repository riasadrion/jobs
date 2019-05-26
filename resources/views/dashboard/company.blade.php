@extends('layouts.dashboard')

@section('title', 'Company List')

@section('page-title', 'Company List')



@section('dashboard-content')
   <div class="row">
   <div class="col-md-8">
    <div class="post-job box">
    <h3 class="job-title">Companies <a class="badge badge-pill badge-success float-right" data-toggle="modal" data-target="#addcompany" href="">Add New</a></h3>
      @if(count($companies)>0)
     <table class="table">
      <tbody>
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>Options</td>
        </tr>
      <?php $i = 1 - $companies->perPage(); $skipped = $companies->currentPage() * $companies->perPage(); ?>
      @foreach($companies as $company)

        <tr>
          <td>
            {{ $skipped + $i }}
         </td>
          <td>{{$type->company}}</td>
          <td>



            <a data-id="{{$company->id}}" href="#" data-name="{{$company->name}}" data-toggle="modal" data-target="#editcompany" style="font-size: 20px; color: #0049d3"><i class="lni-pencil-alt"></i></a>


            <a style="font-size: 20px; color: #f89872" data-toggle="modal" data-id="{{$company->id}}" data-target="#deletecompany" href=""><i class="lni-trash"></i></a>
          </td>
        </tr>
        <?php $i++; ?> 
      @endforeach

        


      </tbody>
     </table>
        {{$companies->links('vendor.pagination.bootstrap-4')}}
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
      <form id="form3" class="form-ad" action="/companies/store" method="POST">
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

               <div class="custom-file mb-3">
               <input type="file" class="custom-file-input" id="validatedCustomFile" >
               <label class="custom-file-label form-control" for="validatedCustomFile">Choose logo...</label>
               <div class="invalid-feedback">Example invalid custom file feedback</div>
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

{{-- Edit type --}}
<div class="modal fade" id="edittype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form4" class="form-ad" action="/types/" method="POST">
      <div class="modal-body">
                 @csrf
               <div class="form-group">
                 <input id="id" type="hidden" name="id" required>
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


