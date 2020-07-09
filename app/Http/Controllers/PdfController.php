<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    //
    public function test(){
        $data = "Bismillah";
        $pdf = PDF::loadView('pdf.test', compact('data'));
        return $pdf->download('test.pdf');
    }
}
