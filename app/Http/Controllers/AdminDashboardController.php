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
        dd($request->all());
    }
}
