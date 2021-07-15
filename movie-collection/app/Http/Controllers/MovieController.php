<?php

namespace App\Http\Controllers;

use App\Category;
use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){

        if(request('category')){
            $movies = Category::where('name', request('category'))->firstOrFail()->movies;
        } else {
            $movies = Movie::latest()->get();
        }


        return view('movies.index', ['movies' => $movies]);
    }

    public function show(Movie $movie){
        return view('movies.show', compact('movie'));

    }

    public function create(){
        return view('movies.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(){
        $this->validateMovie();

        $movie = new Movie(request(['name']));
        $movie->save();

        $movie->categories()->attach(request('categories'));

        return redirect(route('movies.index'));
    }

    public function edit(Movie $movie){

        return view('movies.edit', compact('movie'), ['categories' => Category::all()]);
    }

    public function update(Movie $movie){
        $movie->update($this->validateMovieUpdate());
        $movie->categories()->sync(request('categories'));
        return redirect($movie->path());
    }

    public function destroy(){
        
    }

    protected function validateMovie(){
        return request()->validate([
            'name' => 'required',
            'categories' => 'exists:categories,id'
        ]);
    }

    protected function validateMovieUpdate(){
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
