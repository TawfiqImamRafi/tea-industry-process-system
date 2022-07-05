@extends('layouts.dashboard')

@section('content')

   <div class="row">
       <div class="col-md-6 offset-3">
       <div class="box">
       
        <form action="{{ route('tea.purchase.store')}}" method="post">
        <div class="box-body">
            @csrf
                        <input type="hidden" name="daily_prices_id" value="" >

                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Company Name</label>
                    <div class="col-md-9">                    
                                             
                        <input type="text" name="company_name" value="{{App\Models\User::where('id',$tea->company_name)->first()->first_name;
}}" class="form-control" readonly >                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Category Name</label>
                    <div class="col-md-9">                    
                                             
                        <input type="text" name="category_name" value="{{App\Models\TeaCategory::where('id',$tea->category_id)->first()->name;
}}" class="form-control" readonly >                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Tea Price</label>
                    <div class="col-md-9">                    
                                             
                        <input type="text" name="tea_price" value="{{$tea->tea_price}}" class="form-control" readonly >                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-md-3 col-form-label">Amount</label>
                    <div class="col-md-9">                    
                                             
                        <input type="text" name="amount" class="form-control"  >                       
                    </div>
                </div>
              
               
              
             
            <div class="form-group my-10 text-right">
                <button type="submit" class="btn btn-primary">Purchase</button>
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


@endpush
