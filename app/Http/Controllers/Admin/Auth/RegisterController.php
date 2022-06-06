<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'mobile' => 'required|unique:users',
            'gender' => 'required',
            'role' => 'required',
            'password' => ' required|confirmed',
            'password_confirmation'=> 'required'
        ], [
            'first_name.required' => 'First name required',
            'last_name.required' => 'Last name required',
        ]);

        $user = new User();
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->mobile = $request->get('mobile');
        $user->password = Hash::make($request->get('password'));
        $user->gender = $request->get('gender');
        $user->address = $request->get('address');
        if ($user->save()) {
            $user->attachRole($request->get('role'));
            // return response()->json([
            //     'type' => 'success',
            //     'title' => 'Welcome!',
            //     'message' => 'You have registered successfully'
            // ]);

            return redirect('login')->with('message', 'You have registered successfully');;
        }

        return response()->json([
            'type' => 'error',
            'title' => 'Failed!',
            'message' => 'Registration failed'
        ]);


    }
}
