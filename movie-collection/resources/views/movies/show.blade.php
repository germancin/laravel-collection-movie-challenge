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

                    <p>Categories:</p>

                    @forelse ($movie->categories as $category)
                        <div class="content">
                            <a href="{{ route('movies.index', ['category' => $category->name]) }}">{{ $category->name }}</a>
                        </div>
                    @empty
                        <p>
                            This movie has no categories.
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection