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

    public function show(){

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

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){
        
    }

    protected function validateMovie(){
        return request()->validate([
            'name' => 'required',
            'categories' => 'exists:categories,id'
        ]);
    }
}
