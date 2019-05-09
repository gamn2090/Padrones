<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use DB;
use App\Imports\PadronsImport;
use App\Padron;
use Session;
use Excel;

class ImportController extends Controller
{
    public function importExport()
    {
        return view('import');
    }

    public function importExcel()
    {
        Excel::Import(new PadronsImport, storage_path('padron.csv'));        

        Session::put('success', 'Youe file successfully import in database!!!');

        return back();
    }
}
