@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <span class="float-end"><a href="/listings/create" class="btn btn-secondary">Create Listings</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h3>Your Listings</h3>
                    @if (count($listings))

                    <table>
                        <thead>
                            <tr>
                                <th>Company</th>
                            </tr>
                        </thead>

                        <tbody>
                                                                                                    
                            @foreach ($listings as $list)
                                <tr>
                                    <td>{{ $list->name }}</td>
                                    <td>
                                        <form action="/listings/{{ $list->id }}" method="post" class="float-start">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="button" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="/listings/{{ $list->id }}/edit" class="btn btn-info float-end">Edit</a>
                                    </td>

                                </tr>                     
                            @endforeach
                        </tbody>
                    </table>

                    @else

                    <p>you dont have any listings</p>

                    @endif
                    

                </div>
            </div>
        </div>
    </div>

@endsection
