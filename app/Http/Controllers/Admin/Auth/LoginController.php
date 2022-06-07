<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        parent::__construct();
    }

    public function showLoginForm()
    {
        $data = [
            'page_title' => 'Login',
            'page_header' => 'Login',
        ];

        return view('auth.login')->with(array_merge($this->data, $data));
    }

    public function showRegistrationForm()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        // $cities = City::select('id', 'name', 'country_id')->orderBy('name', 'ASC')->get();
        $data = [
            'page_title' => 'Registration',
            'page_header' => 'Registration',
            'roles' => $roles
        ];

        return view('auth.register')->with(array_merge($this->data, $data));
    }

    /**
     * find username or email
     *
     * @return string
     */
    public function username()
    {
        if (filter_var(request()->email, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        } else {
            return 'mobile';
        }
    }

    /**
     * login validtion
     *
     * @return string
     */
    public function loginValidation(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|min:8',
            'password' => 'required',
        ], [
            'email.required' => 'Phone or email is required',
            'email.min' => 'length should be more than 8'
        ]);
    }

    /**
     * attempt login with username or email
     *
     */
    public function login(Request $request)
    {
        $this->loginValidation($request);

        //attempt login with usename or email
        if ($this->username() === 'mobile') {
            $mobile = $request->email;
            $user = User::where('mobile', 'like', '%'.$mobile)->first();

            if ($user) {
                if (Hash::check($request->get('password'), $user->password)) {
                    Auth::guard()->login($user);
                } else {
                    return redirect()->back()->withErrors([
                        'email' => 'Invalid Email or Password'
                    ]);
                }
            } else {
                return redirect()->back()->withErrors([
                    'email' => 'Invalid Email or Password'
                ]);
            }
        }
        else {
            Auth::attempt([$this->username() => $request->email, 'password' => $request->password]);
        }

        //was any of those correct ?
        if (Auth::check()) {
            if (Auth::user()->hasRole('company')) {
                return redirect()->intended('/');
            } else if (Auth::user()->hasRole('farmer')) {
                return redirect()->intended('/');
            } else if (Auth::user()->hasRole('wholesaler')) {
                return redirect()->intended('/');
            }

            Auth::logout();
        }

        //Nope, something wrong during authentication
        return redirect()->back()->withErrors([
            'email' => 'Invalid Email or Password'
        ]);
    }

    //custom-logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
