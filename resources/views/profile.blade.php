@extends('layouts.nav')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
    
        <div class="col-md-8">
        <h3>Profile</h3>
            <div class="card border-0">

                <div class="card-body">
                    <label>Name: </label></br>
                    <h6>{{ auth()->user()->name }}</h6></br>
                    <label>Email: </label></br>
                    <h6>{{ auth()->user()->email }}</h6></br>
                    <label>Account Created On</label></br>

                    <h6>{{ date('F d, Y h:i A', strtotime(date(auth()->user()->created_at))) }}</h6>
                </div>

                <!--  -->
            </div>
        </div>
    </div>
</div>
@endsection