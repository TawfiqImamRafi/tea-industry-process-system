@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-action">
            <h3 class="box-title">Price List</h3>
            @if(Auth::user()->hasRole('company'))
                <a href="{{ route('price.create') }}" class="btn btn-sm btn-secondary float-right">Create new</a>
            @endif
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Company</th>
                    <th>Tea category</th>

                    <th>Date</th>
                    <th>Tea price</th>
                    <th>Amount</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($prices->isNotEmpty())
                    @foreach ($prices as $key => $price)
                        <tr>
                            <td>{{ $key+1 }}</td>
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

@endsection

