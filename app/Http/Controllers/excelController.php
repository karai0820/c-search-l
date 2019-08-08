<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\Import;

class excelController extends Controller
{
    public function import(Request $request)
    {
       (new Import)->import($request->excel_file); 
      
    }
}

