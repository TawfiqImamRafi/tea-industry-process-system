@extends('layouts.dashboard')

@section('content')

   <div class="row">
       <div class="col-md-6 offset-3">
       <div class="box">
        <div class="box-header with-action">
            <h5 class="box-title">Create today's price</h5>
            <a href="{{ route('price.list') }}" class="btn btn-sm btn-secondary float-right">Price List</a>
        </div>
        {!! Form::open(['route' => 'price.store', 'method' => 'POST']) !!}
        <div class="box-body">
        <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Factory</label>
                    <div class="col-md-9">
                        <select class="form-select form-control bg-gray-50" id="" name="company_id">
                            <option value="">Choose Factory</option>

                            @foreach($companies as $company)
                                <option value={{ $company->id }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>
        <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tea Category</label>
                    <div class="col-md-9">
                        <select class="form-select form-control bg-gray-50" id="" name="category_id">
                            <option value="">Choose category</option>

                            @foreach($categories as $category)
                                <option value={{ $category->id }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tea price(per kg)</label>
                    <div class="col-md-9">
                        <input type="number" name="tea_price" id="title" placeholder="Enter tea price" class="form-control bg-gray-50">
                        <span class="text-danger">{{ $errors->first('tea_price') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Weight(kg)</label>
                    <div class="col-md-9">
                        <input type="number" name="amount" id="title" placeholder="Enter weight" class="form-control bg-gray-50">
                        <span class="text-danger">{{ $errors->first('amount') }}</span>
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
