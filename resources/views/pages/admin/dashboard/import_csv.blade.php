@extends('layouts.admin-master')

@section('title', 'Import Csv File')

@section('content')
<div class="container content-area">
    <div class="section">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}"><i class="fe fe-life-buoy mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page">Import Csv File</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Device Type</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label mt-0">Select CSV File For</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror select2 custom-select" data-placeholder="Choose one" required>
                                        <option label="Choose one"></option>
                                        <option value="1">Divisions CSV File</option>
                                        <option value="2">Districts CSV File</option>
                                        <option value="3">Others CSV File</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-label">Upload CSV File</div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="example-file-input-custom">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-block">Upload CSV File</button>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin_dashboard') }}" class="btn btn-warning btn-block">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection