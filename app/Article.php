<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    // public function tags(){
    //     return $this->belongsToMany('App\Tag', 'article_tag',  'article_id','tag_id');
    // }

    public function tags()
    {
    return $this->belongsToMany('App\Tag', 'article_tag'); // assuming user_id and task_id as fk
    }

}
