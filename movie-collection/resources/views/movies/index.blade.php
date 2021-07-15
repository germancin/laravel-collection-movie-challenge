@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Movies</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @forelse ($movies as $movie)
                        <div class="content">
                            <div class="title">
                                <h2>
                                    {{-- Each movie name is a link to movies/movie-id, routes to MovieController@show --}}
                                    <a href="{{ $movie->path() }}">
                                    {{ $movie->name }}
                                    </a>
                                </h2>
                            </div>
                        </div>
                    @empty
                        <p>
                            No movies in collection.
                        </p>
                    @endforelse

                    {{-- Create button to link to create new movie page. Routes to MovieController@create --}}
                    <form method="GET" action="/movies/create">
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" type="submit">Add New Movie</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection