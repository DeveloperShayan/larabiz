@extends('layouts.app')

@section('content')

    <div class="card p-2 m-2">
        <div class="card-header">
            <h2>{{ $listings->name }}</h2>
            <span class="float-end"><a class="btn btn-secondary" href="/home">Go Back</a></span>
        </div>
            <form action="/listings/{{ $listings->id }}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" name="name" type="text" value="{{  $listings->name }}">
                    </div>
            
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" class="form-control" name="address" type="text" value="{{  $listings->address }}">
                    </div>

                    <div class="form-group">
                        <label for="website">Website</label>
                        <input id="website" class="form-control" name="website" type="text" value="{{ $listings->website }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" name="email" type="email" value="{{  $listings->email }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input id="phone" class="form-control" name="phone" type="number" value="{{  $listings->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <input id="bio" class="form-control" name="bio" type="text" value="{{  $listings->bio }}">
                    </div>
                    
                    
                    <button class="btn btn-outline-success btn-block" type="submit">Submit</button>

                </form>
        
           
    </div>        

@endsection