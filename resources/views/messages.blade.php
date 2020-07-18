@if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger alert-dismissible">
    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
    {{$error}}
</div>
@endforeach
@endif


@if(session('success'))
<div class="alert alert-success alert-dismissible">
    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
    {{session('success')}}
</div>
@endif


@if(session('error'))
<div class="alert alert-danger alert-dismissible">
    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
    {{session('error')}}
</div>
@endif

@if(session('info'))
<div class="alert alert-info alert-dismissible">
    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
    {{session('info')}}
</div>
@endif

@if(session('warning'))
<div class="alert alert-warning alert-dismissible">
    <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
    {{session('warning')}}
</div>
@endif
