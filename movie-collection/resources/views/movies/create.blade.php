@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection

@section('content')

<div id="page" class="container">
    <h1 class="heading has-text-weight-bold is-size-4">New Movie</h1>
    
    {{-- Post to movies, uses @csrf to allow cross site request --}}
    <form method="POST" action="/movies">
        @csrf
        <div class="field">
            <label class="label" for="name">Name</label>

            <div class="control">
                <input 
                    class="input @error('name') is-danger @enderror" 
                    type="text" 
                    name="name" 
                    id="name"
                    {{-- using the old function keeps info on page when error is thrown --}}
                    value="{{ old('name') }}"
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
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                @error('categories')
                <p class="help is-danger">{{ $message }}</p>
                @enderror

            </div>
        </div>

        {{-- Button posts to /movies, routes to MovieController@store --}}
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>
            </div>
        </div>

    </form>
</div>

@endsection