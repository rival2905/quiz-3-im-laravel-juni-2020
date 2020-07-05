<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class ArticleModel
{
    public static function get_all(){
        $data = DB::table('articles')->get();
        return $data;
    }

    public static function get_byId($id){
        $data = DB::table('articles')
        ->where('id', $id)->get();
        return $data;
    }

    public static function save($data){
        $new_data = DB::table('articles')->insert($data);

        return $new_data;
    }

    public static function update($id, $data){
        $update = DB::table('articles')
        ->where('id',$id)
        ->update($data);

        return $update;
    }

    public static function destroy($id){
        $delete = DB::table('articles')
                        ->where('id',$id)
                        ->delete();
        return $delete;
    }
}
