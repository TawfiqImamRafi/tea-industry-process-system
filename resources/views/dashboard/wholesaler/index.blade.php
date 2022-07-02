@extends('layouts.dashboard')

@section('content')
    <div class="box">
        <div class="box-header with-action">
            <h3 class="box-title">Company List</h3>
        </div>
 
        <div class="box-body">
            <table class="table table-bordered table-hover table-responsive-lg">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($userRole as $key => $role)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ App\Models\User::where('id',$role->user_id)->first()->first_name }}</td>
                            <td>{{ App\Models\User::where('id',$role->user_id)->first()->email }}</td>
                         
                         
                        </tr>
                    @endforeach
            
                </tbody>
            </table>
        </div>
        <div class="box-footer">
        </div>
    </div>

@endsection
