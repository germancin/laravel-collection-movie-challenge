@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome to the Movie Collection, {{ Auth::user()->name }}!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        {{-- Button to go to movies list, routes to MovieController@index --}}
                    <form method="GET" action="/movies">
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" type="submit">Browse Movies</button>
                            </div>
                        </div>
                    </form>
                    {{-- Button to go to categories list --}}
                    <form method="GET" action="/categories">
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" type="submit">Browse By Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
