@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-action">
            <h3 class="box-title">Blog List</h3>
            <a href="{{ route('blog.create') }}" class="btn btn-sm btn-secondary float-right">Create new</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Thumbnail</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($blogs->isNotEmpty())
                    @foreach ($blogs as $key => $blog)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>
                                @if($blog->thumbnail)
                                    <img src="{{ asset($blog->thumbnail) }}" alt="" width="40px">
                                @endif
                            </td>
                            <td>
                                <div class="action-el">
                                    <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    {!! Form::open(['route' => ['blog.destroy', $blog->id], 'method' => 'DELETE', 'class'=>'action-el']) !!}
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
                        <td colspan="5">No blog found</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="box-footer">
        </div>
    </div>

@endsection
