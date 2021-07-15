<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //this sets non mass assignable attributes to none
    protected $guarded = [];
    
    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
