@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-action">
            <h3 class="box-title">Sale List</h3>
            <button class="btn btn-primary" disabled>Total Sale: {{$total_purchase}}Tk</button>
        </div>
 
        <div class="box-body">
            <table class="table table-bordered table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Wholesaler</th>
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
                            <td>{{ $purchase->wholesaler->first_name }}</td>
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

@endsection
