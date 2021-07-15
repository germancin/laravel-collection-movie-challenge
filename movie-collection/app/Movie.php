<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // This sets non mass assignable attributes to none
    protected $guarded = [];
    
    // Helps find uri path of given movie
    public function path(){
        return route('movies.show', $this);
    }

    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
