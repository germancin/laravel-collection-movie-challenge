@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection

@section('content')

<div id="page" class="container">
    <h1 class="heading has-text-weight-bold is-size-4">New Movie</h1>
    {{-- Create form that uses "post" but really do "put" with Laravel @method --}}
    <form method="POST" action="/movies/{{ $movie->id }}">
        @csrf
        @method('PUT')
        <div class="field">
            <label class="label" for="name">Name</label>

            <div class="control">
                <input 
                    class="input @error('name') is-danger @enderror" 
                    type="text" 
                    name="name" 
                    id="name"
                    value="{{ $movie->name }}"
                >

                @error('name')
                <p class="help is-danger">{{ $errors->first('name') }}</p>
                @enderror

            </div>
        </div>

        <div class="field">
            <label class="label" for="categories">Categories</label>

            <div class="select is-multiple control">
                <select
                    name="categories[]"
                    multiple
                >
                    @foreach ($categories as $category)
                    {{-- Loops through all categories, adding each to select menu --}}
                        <option
                            {{-- Check if movie has this category already, if so loads the page with the selection already active --}}
                            @if($movie->categories->contains($category))
                                selected
                            @endif
                            value="{{ $category->id }}">{{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('categories')
                <p class="help is-danger">{{ $message }}</p>
                @enderror

            </div>
        </div>

        {{-- When submitted, does put request to movie/movie-id. Routes to MovieController@update --}}
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>
            </div>
        </div>

    </form>
</div>

@endsection