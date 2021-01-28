<?php

namespace App\Http\Requests\CsvUpload;

use Illuminate\Foundation\Http\FormRequest;

class CsvUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'csv_file_type' => 'required|in:1,2,3',
            'file_name'     => 'required|mimes:csv'
        ];
    }

    public function messages()
    {
        return [
            'csv_file_type.required'    => 'CSV File Type Name is Required',
            'csv_file_type.in'          => 'Please Provide Valid CSV File Type Name',
            'file_name.required'        => 'CSV File Upload required',
            'file_name.mimes'           => 'Please Upload Valid CSV File'
        ];
    }
}
