@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-action">
            <h3 class="box-title">Company List</h3>
            <a href="{{ route('company.create') }}" class="btn btn-sm btn-secondary float-right">Create new</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($companies->isNotEmpty())
                    @foreach ($companies as $key => $company)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->phone }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->address }}</td>
                            <td>
                                <div class="action-el">
                                    <a href="{{ route('company.edit', $company->id) }}" class="btn btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    {!! Form::open(['route' => ['company.destroy', $company->id], 'method' => 'DELETE', 'class'=>'action-el']) !!}
                                    <button type="submit" class="btn btn-danger custom-btn-sm" onclick="deleteSubmit(this, event)" data-toggle="tooltip" title="Delete" data-placement="top">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No company found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="box-footer">
        </div>
    </div>

@endsection
