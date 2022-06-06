@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="auth-box login-box">
    <div class="auth-box-header">
        <h2 class="auth-box-title">Register</h2>
    </div>
    <div class="auth-box-body">
        {!! Form::open(['route' => 'register.store', 'method' => 'POST']) !!}
        <div class="form-group @error('first_name') has-error @enderror">
            <label for="">First Name</label>
            <div class="input-group">
                    <span class="input-group-icon">
                        <i class="bx bx-user"></i>
                    </span>
                <input type="text" name="first_name" placeholder="Enter first name" class="form-control" value="{{ old('first_name') }}" required autocomplete="first-name" autofocus>
            </div>
            @error('first_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group @error('last_name') has-error @enderror">
            <label for="">Last Name</label>
            <div class="input-group">
                    <span class="input-group-icon">
                        <i class="bx bx-user"></i>
                    </span>
                <input type="text" name="last_name" placeholder="Enter last name" class="form-control" value="{{ old('last_name') }}" required autocomplete="last-name" autofocus>
            </div>
            @error('last_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group @error('email') has-error @enderror">
            <label for="">Email</label>
            <div class="input-group">
                    <span class="input-group-icon">
                        <i class='bx bx-envelope' ></i>
                    </span>
                <input type="email" name="email" placeholder="Enter email" class="form-control" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group @error('mobile') has-error @enderror">
            <label for="">Mobile</label>
            <div class="input-group">
                    <span class="input-group-icon">
                        <i class="bx bx-phone"></i>
                    </span>
                <input type="tel" name="mobile" placeholder="Enter mobile" class="form-control" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
            </div>
            @error('mobile')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group @error('address') has-error @enderror">
            <label for="">Address</label>
            <div class="input-group">
                    <span class="input-group-icon">
                        <i class="bx bx-home"></i>
                    </span>
                <input type="text" name="address" placeholder="Enter address" class="form-control" value="{{ old('address') }}" required autocomplete="address" autofocus>
            </div>
            @error('address')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group @error('gender') has-error @enderror">
            <label for="">Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                <label class="form-check-label" for="inlineRadio1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                <label class="form-check-label" for="inlineRadio2">Female</label>
              </div>
            @error('gender')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group @error('address') has-error @enderror">
            <label for="">Role</label>
            <div class="input-group">
                    <span class="input-group-icon">
                        <i class="bx bx-key"></i>
                    </span>
                    <select name="role" class="form-control">
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                        @endforeach
                    </select>
            </div>
            @error('address')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group @error('password') has-error @enderror">
            <label for="">Password</label>
            <div class="input-group">
                        <span class="input-group-icon">
                            <i class="bx bx-lock-open"></i>
                        </span>
                <input type="password" name="password" placeholder="Enter password" class="form-control" required autocomplete="new-password">
            </div>
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group @error('password_confirmation') has-error @enderror">
            <label for="">Confirm Password</label>
            <div class="input-group">
                        <span class="input-group-icon">
                            <i class="bx bx-lock-open"></i>
                        </span>
                <input type="password" name="password_confirmation" placeholder="Enter password" class="form-control" required autocomplete="new-password">
            </div>
            @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-submit">
            <button type="submit" class="submit-btn">Register</button>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="auth-box-footer">
        <div class="p-3">
            <span>Already registered?</span>
            <a href="{{ route('login') }}">Login Now</a>
        </div>
    </div>
</div>
@endsection
