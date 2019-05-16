<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'completed', 'deleted' , 'categoryId'];

    public function category() {

        return $this->belongsTo('App\Category' , 'categoryId');
    }

    public function tags() {

        return $this->belongsToMany('App\Tag');
    }


}
