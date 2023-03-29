@extends('layouts.nav')

<style>
    .text-limit{
        font-size:15px;
        display: -webkit-box;
        overflow: hidden;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
    }
</style>
@section('content')
<div class="container">
    <div class="card p-3 border-0">
        <div class="row">
            <div class="col-10">
                <h3>Write an Article</h3>
            </div>
            <div class="col-2">
                <a class="btn btn-custom" style="float:right" href="{{ route('home.create') }}">Write an Article</a>
                <!-- <button type="button" class="btn btn-custom" style="float:right" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Write an Article
                </button> -->
            </div>
        </div>
    </div>
    </div>
</div>
<div class="container mt-3">
@foreach($articles as $item)
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete this Article?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="mt-0 mb-0" action="{{ route('home.destroy', $item->id) }}" method="post" style="float:right;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Delete</button>
                
            </form>
      </div>
     
    </div>
  </div>
</div>
<div class="scrolling-pagination">
    <div class="card  mt-3 border-0">
        <div class="card-header bg-light border-0">
            <div style="float:right"> <a class="btn btn-custom" href="{{ route('home.edit', $item->id) }}">Edit</a>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Delete</button>
                </div>
                   
                

        </div>
        <div class="row p-3">
            <div class="col-3">
                @if(isset($item->photo))
                <img src="{{ asset('public/images/'.$item->photo) }}" class="img-thumbnail" style="margin-left: auto; margin-right: auto; display: block; height:200px; width:200px;">
                @else
                    <img src="{{ asset('public/images/default.png') }}" class="img-thumbnail" style="margin-left: auto; margin-right: auto; display: block;">
                @endif
            </div>
            <div class="col-9">
                <h2 hidden>{{ $loop->iteration }}</h2>
                <h2>{{ $item->caption }}</h2>
                <h2 class="text-limit">{{ $item->description }}</h2>
                <a class="btn btn-custom" href="{{ route('home.show', $item->id) }}">Read More</a>
            </div>
        </div>
    </div>
    @endforeach

</div>
{{$articles->links()}}
</div>

@endsection
