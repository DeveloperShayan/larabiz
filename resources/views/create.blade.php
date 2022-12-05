@extends('layouts.app')

@section('content')

    <div class="card p-2 m-2">
        <div class="card-header">
            <h2>{Add Listings}</h2>
            <span class="float-end"><a class="btn btn-secondary" href="/home">Go Back</a></span>
        </div>
            <form action="/listings" method="post">
                @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" name="name" type="text" value="{{ old('name') }}">
                    </div>
            
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" class="form-control" name="address" type="text" value="{{ old('address') }}">
                    </div>

                    <div class="form-group">
                        <label for="website">Website</label>
                        <input id="website" class="form-control" name="website" type="text" value="{{ old('website') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" name="email" type="email" value="{{ old('email') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input id="phone" class="form-control" name="phone" type="number" value="{{ old('phone') }}">
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <input id="bio" class="form-control" name="bio" type="text" value="{{ old('bio') }}">
                    </div>
                    
                    
                    <button class="btn btn-outline-success btn-block" type="submit">Submit</button>

                </form>
        
           
    </div>        

@endsection