@extends('layouts.dashboard')

@section('content')
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

@endsection
