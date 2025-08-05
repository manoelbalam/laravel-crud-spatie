@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb d-flex justify-content-between align-items-center mb-3">
        <h2>Companies</h2>
        SELECT id FROM companies WHERE employees > 1000;
        @can('company-create')
            <a class="btn btn-success btn-sm" href="{{ route('companies.create') }}">
                <i class="fa fa-plus btn-sm"></i>
            </a>
        @endcan
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert"> 
        {{ $message }}
    </div>
@endif

@php
    $i = ($companies->currentPage() - 1) * $companies->perPage();
@endphp

<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Employees</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($companies as $company)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->employees }}</td>
            <td>
                <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                    <a class="btn btn-info btn-sm" href="{{ route('companies.show',$company->id) }}">
                        <i class="fa-solid fa-list"></i>
                    </a>
                    @can('company-edit')
                        <a class="btn btn-primary btn-sm" href="{{ route('companies.edit',$company->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    @endcan

                    @csrf
                    @method('DELETE')

                    @can('company-delete')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

{!! $companies->links() !!}

@endsection