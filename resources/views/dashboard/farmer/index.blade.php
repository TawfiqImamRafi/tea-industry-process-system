@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-action">
            <h3 class="box-title">Farmer List</h3>
            <a href="{{ route('farmer.create') }}" class="btn btn-sm btn-secondary float-right">Create new</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($farmers->isNotEmpty())
                    @foreach ($farmers as $key => $farmer)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $farmer->name }}</td>
                            <td>{{ $farmer->phone }}</td>
                            <td>{{ $farmer->address }}</td>
                            <td>
                                <div class="action-el">
                                    <a href="{{ route('farmer.edit', $farmer->id) }}" class="btn btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    {!! Form::open(['route' => ['farmer.destroy', $farmer->id], 'method' => 'DELETE', 'class'=>'action-el']) !!}
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
                        <td colspan="5">No farmer found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="box-footer">
        </div>
    </div>

@endsection
