@extends('layouts.nav')
@section('content')

<div class="container">
  <div class="card border-0 p-3" style="margin:20px;">
    <div class="">
      @if(isset($articles->photo))
          <img src="{{ asset('public/images/'.$articles->photo) }}" class="img-thumbnail" style="margin-left: auto; margin-right: auto; display: block; height:300px; width:300px;">
      @else
          <img src="{{ asset('public/images/default.png') }}" class="img-thumbnail" style="margin-left: auto; margin-right: auto; display: block;">
      @endif
    </div>
    <div class="card-body">
        <div class="card-body">
          <!-- <h5 class="card-title">Image : {{ $articles->photo }}</h5> -->
          <h3 class="card-text">Caption : {{ $articles->caption }}</h3>
          <p class="card-text">Date Created : {{ $articles->created_at}}</p>
          <p class="card-text">Description : {{ $articles->description }}</p>
        </div>
    </div>
  </div>
</div>


@endsection