@extends('layouts.nav')
@section('content')

<div class="container">
    <h3>Write an Article</h3>
    <div class="card border-0 p-3">
        <form action="{{ url('home') }}" method="post" enctype="multipart/form-data" class="row g-3">
            {!! csrf_field() !!}
            <div class="">
                <label for="formFile" class="form-label">Default file input example</label>
                <input type="file" name="photo" step="any" class="form-control">
            </div>
            <!-- <div class="">
                <label for="exampleFormControlInput1" class="form-label">Enter Image</label>
                <input type="text" name="image" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div> -->
            <div class="">
                <label for="exampleFormControlInput1" class="form-label">Enter Caption</label>
                <input type="text" name="caption" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-custom w-100">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection