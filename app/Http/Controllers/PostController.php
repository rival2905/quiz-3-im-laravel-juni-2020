<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\PostExport;
use Maatwebsite\Excel\Facades\Excel;



class PostController extends Controller
{
    public function export() 
    {
        return Excel::download(new PostExport, 'post.xlsx');
    }
}
