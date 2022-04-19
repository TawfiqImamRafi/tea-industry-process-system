@extends('layouts.dashboard')

@section('content')

    <div class="box">
        <div class="box-header with-action">
            <h5 class="box-title">Update New Farmer</h5>
            <a href="{{ route('farmer.list') }}" class="btn btn-sm btn-secondary float-right">Farmer List</a>
        </div>
        {!! Form::open(['route' => ['farmer.update', $farmer->id], 'method' => 'PUT']) !!}
        <div class="box-body">
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Name</label>
                <div class="col-md-9">
                    <input type="text" name="name" id="name" placeholder="Enter name" class="form-control" value="{{$farmer->name}}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Phone</label>
                <div class="col-md-9">
                    <input type="tel" name="phone" id="title" placeholder="Enter phone" class="form-control bg-gray-50" value="{{$farmer->phone}}">
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Address</label>
                <div class="col-md-9">
                    <input type="text" name="address" id="title" placeholder="Enter address" class="form-control bg-gray-50" value="{{$farmer->address}}">
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                </div>
            </div>

            <div class="form-group my-10 text-right">
                <button type="submit" class="btn btn-primary" onclick="formSubmit(this, event)">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="box-footer">

        </div>
    </div>


@endsection
