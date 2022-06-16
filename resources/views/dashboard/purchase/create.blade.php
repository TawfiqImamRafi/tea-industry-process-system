@extends('layouts.dashboard')

@section('content')

   <div class="row">
       <div class="col-md-6 offset-3">
       <div class="box">
       
        {!! Form::open(['route' => 'purchase.store', 'method' => 'POST']) !!}
        <div class="box-body">
                        <input type="number" name="daily_prices_id" value="{{$price->id}}" >
                        <input type="number" name="farmer_id" value="5" >
                        <input type="number" name="amount" value="{{$price->amount}}" >
                        <input type="number" name="tea_price" value="{{$price->tea_price}}" >
                 

                       
                     
                    
       

                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Reason of deduct</label>
                    <div class="col-md-9">
                     

                        <select class="form-select form-control bg-gray-50" id="" name="deduct">
                            <option value="">Choose category</option>

                                <option value="15">Wet leaves</option>
                                <option value="10">Large leaves</option>
                        </select>
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
