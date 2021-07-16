<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        //This gets all the categories in table
        $categories = Category::latest()->get();

        //Goes to categories.index with array of categories
        return view('categories.index', ['categories' => $categories]);
    }
}
