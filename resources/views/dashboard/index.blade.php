@extends('layouts.dashboard')

@section('content')
 
@if(Auth::user()->hasRole('company'))
<div class="row">
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header with-action">
                <h3 class="box-title">Purchase List</h3>
                <button class="btn btn-primary" disabled>Total Purchase: {{$company_total_purchase}}Tk</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-responsive-lg">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Farmer</th>
                        <th>Tea category</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Deduct</th>
                        <th>Net Amount</th>
                        <th>Total Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($company_purchases->isNotEmpty())
                        @foreach ($company_purchases as $key => $purchase)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $purchase->farmer->first_name }}</td>
                                <td>{{ $purchase->dailyPrice->category->name }}</td>
                                <td>{{ user_formatted_date($purchase->date) }}</td>
                                <td>{{ $purchase->amount }}Kg</td>
                                <td>{{ $purchase->deduct }}%</td>
                                <td>{{ $purchase->deduct_amount }}Kg</td>
                                <td>{{ $purchase->grand_total }}Tk</td>
                             
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No purchase found</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header with-action">
                <h3 class="box-title">Sale List</h3>
                <button class="btn btn-primary" disabled>Total Sale: {{$total_company_sale}}Tk</button>
            </div>
     
            <div class="box-body">
                <table class="table table-bordered table-hover table-responsive-lg">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Company</th>
                        <th>Tea category</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($company_sales as $key => $purchase)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $purchase->company->first_name }}</td>
                                <td>{{ $purchase->category->name }}</td>
                                <td>{{ $purchase->price }}</td>
                                <td>{{ $purchase->amount }}</td>
                                <td>{{ $purchase->total }}</td>
                             
                             
                            </tr>
                        @endforeach
                
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
            </div>
        </div>
    </div>
</div>
@endif
@if(Auth::user()->hasRole('farmer'))
<div class="row">
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header with-action">
                <h3 class="box-title">Today's Price List</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-responsive-lg">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Factory</th>
                            <th>Tea category</th>
    
                            <th>Date</th>
                            <th>Tea price</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($prices->isNotEmpty())
                            @foreach ($prices as $key => $price)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $price->company_name }}</td>
                                    <td>{{ $price->category->name }}</td>
                                    <td>{{ user_formatted_date($price->date) }}</td>
                                    <td>{{ $price->tea_price }}</td>
                                    <td>{{ $price->amount }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No price found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header with-action">
                <h3 class="box-title">Recent Sale List</h3>
                <button class="btn btn-primary" disabled>Total Sale: {{$total_sale}}Tk</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-responsive-lg">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Company</th>
                        <th>Tea category</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Deduct</th>
                        <th>Net Amount</th>
                        <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($sales)
                        @foreach ($sales as $key => $sale)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $sale->dailyPrice->company->first_name }}</td>
                                <td>{{ $sale->dailyPrice->category->name }}</td>
                                <td>{{ user_formatted_date($sale->date) }}</td>
                                <td>{{ $sale->amount }}Kg</td>
                                <td>{{ $sale->deduct }}%</td>
                                <td>{{ $sale->deduct_amount }}Kg</td>
                                <td>{{ $sale->grand_total }}Tk</td>
                             
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No sale found</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
            </div>
        </div>
    </div>
</div>
@endif
@if(Auth::user()->hasRole('wholesaler'))
<div class="row">
    <div class="col-lg-6">
        <div class="box">
            <div class="box-header with-action">
                <h3 class="box-title">Tea categories</h3>
            </div>
     
            <div class="box-body">
                <table class="table table-bordered table-hover table-responsive-lg">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($teaCategory as $key => $tea)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $tea->name }}</td>
                                <td>{{ $tea->description }}</td>
                                <td><a href="{{route('tea.purchase',$tea->id)}}" class="btn btn-sm btn-info">Purchase</a></td>
                             
                             
                            </tr>
                        @endforeach
                
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="box">
        <div class="box-header with-action">
            <h3 class="box-title">Purchase List</h3>
            <button class="btn btn-primary" disabled>Total Purchase: {{$total_purchase}}Tk</button>
        </div>
 
        <div class="box-body">
            <table class="table table-bordered table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Company</th>
                    <th>Tea category</th>
                    <th>Amount</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $key => $purchase)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $purchase->company->first_name }}</td>
                            <td>{{ $purchase->category->name }}</td>
                            <td>{{ $purchase->price }}</td>
                            <td>{{ $purchase->amount }}</td>
                            <td>{{ $purchase->total }}</td>
                         
                         
                        </tr>
                    @endforeach
            
                </tbody>
            </table>
        </div>
        <div class="box-footer">
        </div>
    </div>
    </div>
</div>
@endif
@endsection
