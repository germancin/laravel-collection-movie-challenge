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
                            <p>
                                {{ $movie->name }}
                            </p>
                        </div>
                    @empty
                        <p>
                            No movies in collection.
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection