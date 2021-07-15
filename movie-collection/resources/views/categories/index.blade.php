@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- Here, use for loop to display each category as a link --}}
                    @forelse ($categories as $category)
                        <div class="content">
                            <h2>
                                {{-- Links to movies.index (named route) with query string, which then goes to MovieController@index --}}
                                <a href="{{ route('movies.index', ['category' => $category->name]) }}">{{ $category->name }}</a>
                            </h2>
                        </div>
                    @empty
                        <p>
                            No categories to view.
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection