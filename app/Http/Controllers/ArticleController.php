<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Tag;


class ArticleController extends Controller
{
    public function index(){
        // $data = ArticleModel::get_all();
        $data = Article::all();

        return view('article.index', compact('data'))->with('success');
    }

    public function create(){
        $categories = Category::all();
        return view('article.form',compact('categories'));
    }

    public function store(Request $request){
        $data=$request->all();
        $data["slug"]=str_replace(' ', '-', strtolower($data["title"]));
        // $data["tag"]=implode(" ",$data["tag"]);     
     
        // unset($data["_token"]);
        // $save = ArticleModel::save($data);

        // create artikel baru
        $new_artikel = Article::create([
            "name" => $data["name"],
            "title" => $data["title"],
            "content" => $data["content"],
            "slug" => $data["slug"],
            // "tag" => $data["tag"]
            "category_id" => $data["category_id"]
        ]);  
        $tagArr = explode(',', $request->tags);
        $tagsMulti = [];
        foreach($tagArr as $strTag){
            $tagArrAssc["tag_name"] = $strTag;
            $tagsMulti[] = $tagArrAssc;
        }
        // create tags baru
        foreach($tagsMulti as $tagCheck){
            $tag = Tag::firstOrCreate($tagCheck);
            $new_artikel->tags()->attach($tag->id);
        }
        return redirect('/artikel');
        
    }

    public function edit($id){
        $data = Article::find($id);
        foreach($data->tags as $dat){
            $tags[]= $dat->tag_name;
        }
        $data["tag"]=implode(",",$tags); 
        $categories = Category::all();
        return view('article.edit', compact('data', 'categories'));
    }
    public function show($id){
        $data = Article::find($id);
        // dd($data);
        return view('article.show', compact('data'));
    }
    
    public function update($id, Request $request){
        
        $data=$request->all();
        $data["slug"]=str_replace(' ', '-', strtolower($data["title"]));
        // $data["tag"]=implode(" ",$data["tag"]);     
     
        // unset($data["_token"]);
        // $save = ArticleModel::save($data);

        // create artikel baru
        $update_article = Article::find($id);
        $update_article->update([
            "name" => $data["name"],
            "title" => $data["title"],
            "content" => $data["content"],
            "slug" => $data["slug"],
            // "tag" => $data["tag"]
            "category_id" => $data["category_id"]
        ]);  
        $tagArr = explode(',', $request->tags);
        // dd($tagArr);
        $tagsMulti = [];
        foreach($tagArr as $strTag){
            $tagArrAssc["tag_name"] = $strTag;
            $tagsMulti[] = $tagArrAssc;
        }
        $update_article->tags()->detach();
        // dd($tagsMulti);
        // create tags baru
        foreach($tagsMulti as $tagCheck){
            $tag = Tag::firstOrCreate($tagCheck);
            $update_article->tags()->attach($tag->id);
            $temp[]=$tag;
        }
        // dd($temp);
        return redirect('/artikel');
        
    }

    public function destroy($id)
    {
        $save = ArticleModel::destroy($id);
        if($save){
            return redirect('/artikel');
        }
    }
}
