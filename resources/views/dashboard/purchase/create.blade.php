@extends('layouts.dashboard')

@section('content')

   <div class="row">
       <div class="col-md-6 offset-3">
       <div class="box">
       
        <form action="{{ route('purchase.store')}}" method="post">
        <div class="box-body">
            @csrf
                        <input type="hidden" name="daily_prices_id" value="{{$price->daily_prices_id}}" >
                 

                       
                     
                    
       

                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Farmer Name</label>
                    <div class="col-md-9">                    
                        <input type="hidden" name="farmer_id" value={{ $price->farmer_id }}>                       
                        <input type="text" name="farmer" class="form-control" value={{ $price->farmer->first_name }} readonly>                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Purchase Amount(kg)</label>
                    <div class="col-md-9">                                         
                        <input type="number" name="amount" class="form-control" id="purchase_amount" value="{{$price->dailyPrice->amount}}" readonly>                      
                    </div>
                </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tea Price( per kg)</label>
                    <div class="col-md-9">                                         
                        <input type="number" name="tea_price" class="form-control" id="price" value="{{$price->dailyPrice->tea_price}}" readonly>                     
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Reason of deduct</label>
                    <div class="col-md-9">
                     

                        <select class="form-select form-control bg-gray-50" id="deduct" name="deduct">
                            <option value="">Choose category</option>

                                <option value="15">Wet leaves</option>
                                <option value="10">Large leaves</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Deduct Amount( kg)</label>
                    <div class="col-md-9">                                         
                        <input type="number" name="deduct_amount" class="form-control" id="deduct_amount" value="0" readonly>                     
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Grand Total</label>
                    <div class="col-md-9">                                         
                        <input type="number" name="grand_total" class="form-control" id="grand_total" value="{{$price->dailyPrice->amount*$price->dailyPrice->tea_price}}" readonly>                     
                    </div>
                </div>
              
             
            <div class="form-group my-10 text-right">
                <button type="submit" class="btn btn-primary" onclick="formSubmit(this, event)">Save</button>
            </div>
        </form>
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
        $(document).on('change', '#deduct', function (){
            let deduct = $(this).val();
            let purchase_amount = $('#purchase_amount').val();
            let price = $('#price').val();
            let deduct_amount = (deduct*purchase_amount)/100;
            let grand_total = price*(purchase_amount-deduct_amount);
            $('#deduct_amount').val(deduct_amount);
            $('#grand_total').val(grand_total);
        })
    })
 </script>

@endpush
