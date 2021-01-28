@extends('layouts.admin-master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container content-area">
    <div class="section">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}"><i class="fe fe-life-buoy mr-1"></i> Dashboard</a></li>
            </ol>
        </div>
    </div>
    <div class="row row-cards">
        <h3>Dashboard Content Here</h3>
    </div>
</div>
@endsection