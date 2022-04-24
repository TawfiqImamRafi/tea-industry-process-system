@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-action">
            <h3 class="box-title">Today's Price List</h3>
            <a href="{{ route('price.create') }}" class="btn btn-sm btn-secondary float-right">Create new</a>
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
                            <td>{{ $price->company->name }}</td>
                            <td>{{ $price->category->name }}</td>
                            <td>{{ user_formatted_date($price->date) }}</td>
                            <td>{{ $price->tea_price }}</td>
                            <td>{{ $price->amount }}</td>
                            <td>
                                <div class="action-el">
                                    <a href="{{ route('price.edit', $price->id) }}" class="btn btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    {!! Form::open(['route' => ['price.destroy', $price->id], 'method' => 'DELETE', 'class'=>'action-el']) !!}
                                    <button type="submit" class="btn btn-danger custom-btn-sm" onclick="deleteSubmit(this, event)" data-toggle="tooltip" title="Delete" data-placement="top">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </td>
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
