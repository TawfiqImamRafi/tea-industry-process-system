@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-action">
            <h3 class="box-title">Sale List</h3>
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
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($sales->isNotEmpty())
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

@endsection

