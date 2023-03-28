
@extends('layouts.nav')
@section('content')
  

<div class="container">
    <div class="card border-0 p-3" style="margin:20px;">
  <div class="card-header border-0">Edit Student</div>
  <div class="card-body">
       
      <form action="{{ url('home/' .$articles->id) }}" method="post">
      {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$articles->id}}" id="id" />
        <label>Caption</label></br>
        <input type="text" name="caption" id="address" value="{{$articles->caption}}" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="mobile" value="{{$articles->description}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-custom" style="width:100%"></br>
    </form>
    
  </div>
</div>
</div>
@stop