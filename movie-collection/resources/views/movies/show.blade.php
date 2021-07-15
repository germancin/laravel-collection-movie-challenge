@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ $movie->name }}</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Categories:</h3>
                        {{-- Use forelse to retrieve all categories, if any exist for this movie --}}
                    @forelse ($movie->categories as $category)
                        <div class="content">
                            <h2>
                            <a href="{{ route('movies.index', ['category' => $category->name]) }}">{{ $category->name }}</a>
                            </h2>
                        </div>
                    @empty
                        <p>
                            This movie has no categories.
                        </p>
                    @endforelse

                        {{-- Creates button that sends to edit page for this movie, routes to MovieController@edit --}}
                    <form method="GET" action="/movies/{{ $movie->id }}/edit">
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" type="submit">Edit Movie</button>
                            </div>
                        </div>
                    </form>

                        {{-- Create button that posts DELETE to delete this movie. Routes to MovieController@destroy --}}
                    <form method="POST" action="/movies/{{ $movie->id }}">
                        @csrf
                        @method('DELETE')
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" type="submit">Delete Movie</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection