<?php

namespace App\Http\Controllers;

use App\Http\Requests\CsvUpload\CsvUploadRequest;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            if ($request->csv_file_type == 1) {
                $this->divisionCsvUpload($request);
                session()->flash('success', 'Division List Uploaded Successfully');
                return redirect()->route('csv_import');
            }
            if ($request->csv_file_type == 2) {
                $this->districtCsvUpload($request);
                session()->flash('success', 'District List Uploaded Successfully');
                return redirect()->route('csv_import');
            }
        } else {
            session()->flash('error', 'Please Provide valid CSV file');
            return redirect()->route('csv_import');
        }
        dd($request->file_name->getClientOriginalExtension());
    }

    public function divisionCsvUpload(Request $request)
    {
        $currentDate = date('Y_m_d_H_i');
        $orginalName =  preg_replace("/\s+/", "_", $request->file('file_name')->getClientOriginalName());
        $fileName = $currentDate . '_' . $orginalName;
        $file = $request->file('file_name');
        $location = 'uploads';
        $file->move($location . '/', $fileName);
        $filepath = public_path($location . "/" . $fileName);
        $uploadFile = fopen($filepath, "r");

        $importData_arr = array();
        $i = 0;
        while (($filedata = fgetcsv($uploadFile)) !== false) {
            $num = count($filedata);
            // Skip first row 
            if ($i == 0) {
                $i++;
                continue;
            }
            for ($c = 0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
        }
        fclose($uploadFile);

        foreach ($importData_arr as $importData) {
            Division::create([
                'division' => $importData[0]
            ]);
        }
        $unlinkLink = public_path('uploads/' . $fileName);
        unlink($unlinkLink);
    }

    public function districtCsvUpload(Request $request)
    {
        $currentDate = date('Y_m_d_H_i');
        $orginalName =  preg_replace("/\s+/", "_", $request->file('file_name')->getClientOriginalName());
        $fileName = $currentDate . '_' . $orginalName;
        $file = $request->file('file_name');
        $location = 'uploads';
        $file->move($location . '/', $fileName);
        $filepath = public_path($location . "/" . $fileName);
        $uploadFile = fopen($filepath, "r");

        $importData_arr = array();
        $i = 0;
        while (($filedata = fgetcsv($uploadFile)) !== false) {
            $num = count($filedata);
            // Skip first row 
            if ($i == 0) {
                $i++;
                continue;
            }
            for ($c = 0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
        }
        fclose($uploadFile);

        foreach ($importData_arr as $importData) {
            District::create([
                'division_id' => $importData[0],
                'district' => $importData[1]
            ]);
        }
        $unlinkLink = public_path('uploads/' . $fileName);
        unlink($unlinkLink);
    }
}
