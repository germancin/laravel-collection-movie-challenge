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
        
    }

    public function store(){
        
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){
        
    }
}
