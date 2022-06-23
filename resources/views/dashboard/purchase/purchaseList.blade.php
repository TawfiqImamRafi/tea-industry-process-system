@extends('layouts.dashboard')

@section('content')
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
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Deduct</th>
                    <th>Net Amount</th>
                    <th>Total Price</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($purchases->isNotEmpty())
                    @foreach ($purchases as $key => $purchase)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            {{-- <td>{{ $purchase->dailyPrice->company->first_name }}</td> --}}
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

@endsection

