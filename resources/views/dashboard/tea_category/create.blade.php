@extends('layouts.dashboard')

@section('content')

   <div class="row">
       <div class="col-md-6 offset-3">
       <div class="box">
        <div class="box-header with-action">
            <h5 class="box-title">Create New Tea Category</h5>
            <a href="{{ route('category.list') }}" class="btn btn-sm btn-secondary float-right">Tea Category List</a>
        </div>
        {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
        <div class="box-body">
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Name</label>
                    <div class="col-md-9">
                        <input type="text" name="name" id="name" placeholder="Enter name" class="form-control">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Description</label>
                    <div class="col-md-9">
                        <textarea type="tel" name="description" id="title" placeholder="Enter description" class="form-control bg-gray-50"></textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                </div>
                </div>
            <div class="form-group my-10 text-right">
                <button type="submit" class="btn btn-primary" onclick="formSubmit(this, event)">Save</button>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="box-footer">
        </div>

    </div>
       </div>
   </div>
@endsection
