@extends('layouts.dashboard')

@section('content')

   <div class="row">
       <div class="col-md-6 offset-3">
       <div class="box">
        <div class="box-header with-action">
            <h5 class="box-title">New Purchase</h5>
            <a href="{{ route('sale.list') }}" class="btn btn-sm btn-secondary float-right">Purchase List</a>
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
                    <label for="" class="col-md-3 col-form-label">Factory item</label>
                    <div class="col-md-9">
                        <select class="form-select form-control bg-gray-50 test" id="" name="price_id">
                            <option value="">Choose Item</option>

                            @foreach($prices as $price)
                                <option value={{ $price->id }}>{{ $price->company->name }}-{{ $price->category->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('price_id') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tea price(per kg)</label>
                    <div class="col-md-9">
                        <input type="number" name="tea_price" id="tea_price" placeholder="Enter tea price" class="form-control bg-gray-50" readonly>
                        <span class="text-danger">{{ $errors->first('tea_price') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Weight(kg)</label>
                    <div class="col-md-9">
                        <input type="number" name="amount" id="amount" placeholder="Enter amount" class="form-control bg-gray-50" autocomplete="off">
                        <span class="text-danger">{{ $errors->first('amount') }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Total price</label>
                    <div class="col-md-9">
                        <input type="number" name="total_price" id="total_price" placeholder="Enter tea price" class="form-control bg-gray-50" readonly>
                        <span class="text-danger">{{ $errors->first('total_price') }}</span>
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

@push('footer-scripts')
<script>
    $(document).ready(function (){
        $(document).on('change', '.test', function (){
            let price_id = $(this).val();
            let prices = {!! $prices !!};
            let single_price = prices.find(price => {
                        return price.id == price_id
                    })
            $('#tea_price').val(single_price.tea_price);
        })

        $(document).on('keyup change', '#amount', function (){
            let price = $('#tea_price').val();
            let amount = $(this).val();
            let total_price = parseInt(amount)*parseInt(price);
            $('#total_price').val(total_price);
        })
    })
 </script>

@endpush
