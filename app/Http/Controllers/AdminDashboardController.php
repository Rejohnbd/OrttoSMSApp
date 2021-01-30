<?php

namespace App\Http\Controllers;

use App\Http\Requests\CsvUpload\CsvUploadRequest;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard.index');
    }

    public function csvImport()
    {
        return view('pages.admin.dashboard.import_csv');
    }

    public function csvUpload(CsvUploadRequest $request)
    {
        $file_extension = $request->file_name->getClientOriginalExtension();
        if ($file_extension == 'csv') {
            dd('CSV Extension');
        } else {
            session()->flash('error', 'Please Provide valid CSV file');
            return redirect()->route('csv_import');
        }
        dd($request->file_name->getClientOriginalExtension());
    }
}
