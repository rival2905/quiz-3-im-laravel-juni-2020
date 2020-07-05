<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $data = ArticleModel::get_all();
        return view('article.index', compact('data'));
    }

    public function create(){
        return view('article.form');
    }

    public function store(Request $request){
        $data=$request->all();
        $data["slug"]=str_replace(' ', '-', strtolower($data["title"]));
        $data["tag"]=implode(" ",$data["tag"]);        
        unset($data["_token"]);
        $save = ArticleModel::save($data);
        if($save){
            return redirect('/artikel');
        }
    }

    public function edit($id){
        $data = ArticleModel::get_byId($id);
        return view('article.edit', compact('data'));
    }
    public function show($id){
        $data = ArticleModel::get_byId($id);

        foreach($data as $key => $value){
            $datatag = explode(" ", $value->tag);
        }
        
        return view('article.show', compact('data'), compact('datatag'));
    }
    
    public function update($id, Request $request){
        
        $data=$request->all();
        $data["slug"]=str_replace(' ', '-', strtolower($data["title"]));
        $data["tag"]=implode(" ",$data["tag"]); 
        unset($data["_token"]);
        unset($data["_method"]);

        $update = ArticleModel::update($id,$data);
        if($update){
            return redirect('/artikel');
        }
    }

    public function destroy($id)
    {
        $save = ArticleModel::destroy($id);
        if($save){
            return redirect('/artikel');
        }
    }
}
