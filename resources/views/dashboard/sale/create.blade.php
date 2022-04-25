@extends('layouts.dashboard')

@section('content')

   <div class="row">
       <div class="col-md-6 offset-3">
       <div class="box">
        <div class="box-header with-action">
            <h5 class="box-title">Create new sale</h5>
            <a href="{{ route('sale.list') }}" class="btn btn-sm btn-secondary float-right">Sales List</a>
        </div>
        {!! Form::open(['route' => 'sale.store', 'method' => 'POST']) !!}
        <div class="box-body">
            <div class="form-group row">
                <label for="" class="col-md-3 col-form-label">Farmer</label>
                <div class="col-md-9">
                    <select class="form-select form-control bg-gray-50" id="" name="farmer_id">
                        <option value="">Choose farmer</option>

                        @foreach($farmers as $farmer)
                            <option value={{ $farmer->id }}>{{ $farmer->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('farmer_id') }}</span>
                </div>
            </div> 
        <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Company item</label>
                    <div class="col-md-9">
                        <select class="form-select form-control bg-gray-50" id="" name="price_id">
                            <option value="">Choose Item</option>

                            @foreach($prices as $price)
                                <option value={{ $price->id }}>{{ $price->company->name }}-{{ $price->category->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('price_id') }}</span>
                    </div>
                </div>              
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tea price</label>
                    <div class="col-md-9">
                        <input type="number" name="total_price" id="title" placeholder="Enter tea price" class="form-control bg-gray-50">
                        <span class="text-danger">{{ $errors->first('total_price') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Amount</label>
                    <div class="col-md-9">
                        <input type="number" name="amount" id="title" placeholder="Enter amount" class="form-control bg-gray-50">
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
