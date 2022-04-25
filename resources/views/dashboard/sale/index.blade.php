@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-action">
            <h3 class="box-title">Sales List</h3>
            <a href="{{ route('sale.create') }}" class="btn btn-sm btn-secondary float-right">Create new</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Company</th>
                    <th>Tea category</th>
                    <th>Farmer</th>
                    <th>Tea price</th>
                    <th>Amount</th>
                    <th>Created at</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    {{-- {{ dd($sales)}} --}}
                @if($sales->isNotEmpty())
                    @foreach ($sales as $key => $price)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $price->salePrice->company->name }}</td>
                            <td>{{ $price->salePrice->category->name }}</td>
                            <td>{{ $price->farmer->name }}</td>
                            <td>{{ $price->total_price }}</td>
                            <td>{{ $price->amount }}</td>
                            <td>{{ user_formatted_date($price->created_at) }}</td>
                            <td>
                                <div class="action-el">
                                    <a href="{{ route('sale.edit', $price->id) }}" class="btn btn-warning">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    {!! Form::open(['route' => ['sale.destroy', $price->id], 'method' => 'DELETE', 'class'=>'action-el']) !!}
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

