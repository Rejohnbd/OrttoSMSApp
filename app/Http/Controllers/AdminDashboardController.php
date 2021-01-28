<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard.index');
    }

    public function importCsv()
    {
        return view('pages.admin.dashboard.import_csv');
    }
}
