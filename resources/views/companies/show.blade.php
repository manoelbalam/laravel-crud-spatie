@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <h2>Show Company</h2>
        <a class="btn btn-primary btn-sm" href="{{ route('companies.index') }}">
            <i class="fa fa-arrow-left"></i>
        </a>
    </div>
</div>

<div class="row mt-3">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $company->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Employees:</strong>
            {{ $company->employees }}
        </div>
    </div>
</div>

@endsection