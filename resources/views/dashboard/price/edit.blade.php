@extends('layouts.dashboard')

@section('content')

    <div class="row">
        <div class="col-md-6 offset-3">
        <div class="box">
        <div class="box-header with-action">
            <h5 class="box-title">Update Daily Price</h5>
            <a href="{{ route('price.list') }}" class="btn btn-sm btn-secondary float-right">Price List</a>
        </div>
        {!! Form::open(['route' => ['price.update', $price->id], 'method' => 'PUT']) !!}
        <div class="box-body">
        <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Factory</label>
                    <div class="col-md-9">
                    <input type="text" name="company_name" value={{$price->company_name}}  id="title" placeholder="Enter company name" class="form-control bg-gray-50">
                        <span class="text-danger">{{ $errors->first('company_name') }}</span>
                    </div>
                </div>
        <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tea Category</label>
                    <div class="col-md-9">
                        <select class="form-select form-control bg-gray-50" id="" name="category_id">
                            <option value="">Choose category</option>

                            @foreach($categories as $category)
                                <option value={{ $category->id }} {{ $category->id == $price->category_id ? 'selected' : "" }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Date</label>
                    <div class="col-md-9">
                        <input type="date" name="date" id="title" placeholder="Enter tea price" class="form-control bg-gray-50" value={{$price->date}} readonly>
                        <span class="text-danger">{{ $errors->first('tea_price') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tea price(per kg)</label>
                    <div class="col-md-9">
                        <input type="number" name="tea_price" id="title" placeholder="Enter tea price" class="form-control bg-gray-50" value={{$price->tea_price}}>
                        <span class="text-danger">{{ $errors->first('tea_price') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Weight(kg)</label>
                    <div class="col-md-9">
                        <input type="number" name="amount" value={{$price->amount}} id="title" placeholder="Enter weight" class="form-control bg-gray-50">
                        <span class="text-danger">{{ $errors->first('amount') }}</span>
                    </div>

            <div class="form-group my-10 text-right">
                <button type="submit" class="btn btn-primary" onclick="formSubmit(this, event)">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="box-footer">

        </div>
    </div>

        </div>
    </div>

@endsection
