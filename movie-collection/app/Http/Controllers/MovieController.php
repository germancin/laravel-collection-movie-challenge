<?php

namespace App\Http\Controllers;

use App\Category;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        // If there is a query string (category name) display movies by that category
        // Otherwise, just display all movies
        if(request('category')){
            $movies = Category::where('name', request('category'))->firstOrFail()->movies;
        } else {
            $movies = Movie::latest()->get();
        }

        // Display list of movies
        return view('movies.index', ['movies' => $movies]);
    }

    public function show(Movie $movie){
        // Receives movie that was clicked by id, passes to movies.show as an array
        return view('movies.show', compact('movie'));

    }

    public function create(){
        // Gives movie creation view with list of all categories the movie could have
        return view('movies.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(){
        // Validate the inputted information
        $this->validateMovie();

        // Create new movie with the name, the id auto increments and save
        $movie = new Movie(request(['name']));
        $movie->save();

        // Now the movie saved and has id, use attach function to connect on pivot table
        $movie->categories()->attach(request('categories'));

        return redirect(route('movies.index'));
    }

    public function edit(Movie $movie){
        // Goes to edit page with movie information to fill out fields with current information
        return view('movies.edit', compact('movie'), ['categories' => Category::all()]);
    }

    public function update(Movie $movie){
        // First, update the move value
        $movie->update($this->validateMovieUpdate());
        // Then, use sync function (comes from belongsToMany Eloquent relationship)
        // This updates the values on the pivot table
        $movie->categories()->sync(request('categories'));
        // Return to movie information page (movie/movie-id)
        return redirect($movie->path());
    }

    public function destroy(Movie $movie){
        // Delete the movie that was passed into this function, go back to movie list
        $movie->delete();
        return redirect(route('movies.index'));
    }

    protected function validateMovie(){
        // This validates movie info before persisting to table
        return request()->validate([
            'name' => 'required',
            'categories' => 'exists:categories,id'
        ]);
    }

    protected function validateMovieUpdate(){
        // Same as above but without categories, was causing issues with update functions
        // It was trying to insert the categories into the movie table instead of pivot
        // Refactor later
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
