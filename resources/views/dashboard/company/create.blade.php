@extends('layouts.dashboard')

@section('content')

   <div class="row">
       <div class="col-md-6 offset-3">
       <div class="box">
        <div class="box-header with-action">
            <h5 class="box-title">Create New Factory</h5>
            <a href="{{ route('company.list') }}" class="btn btn-sm btn-secondary float-right">Factory List</a>
        </div>
        {!! Form::open(['route' => 'company.store', 'method' => 'POST']) !!}
        <div class="box-body">
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Name</label>
                    <div class="col-md-9">
                        <input type="text" name="name" id="name" placeholder="Enter name" class="form-control">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Phone</label>
                    <div class="col-md-9">
                        <input type="tel" name="phone" id="title" placeholder="Enter phone" class="form-control bg-gray-50">
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-9">
                        <input type="email" name="email" id="title" placeholder="Enter email" class="form-control bg-gray-50">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Location</label>
                    <div class="col-md-9">
                        <input type="text" name="address" id="title" placeholder="Enter address" class="form-control bg-gray-50">
                        <span class="text-danger">{{ $errors->first('address') }}</span>
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
