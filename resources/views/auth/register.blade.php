{{-- @extends('layouts.app')

@section('content')
<div class="container">
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
</div>
@endsection --}}
<x-auth>
    <x-slot name="auth_title">
        <h5 class="text-primary">Free Register</h5>
        <p>Register your account to work here.</p>
    </x-slot>
    <x-slot name="auth_link">
        <p>Already have an account ? <a href="{{route('login')}}" class="fw-medium text-primary"> Login </a> </p>
    </x-slot>

    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="useremail" placeholder="Enter Phone" name="phone" value="{{ old('phone') }}" required>  
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror      
        </div>
    
        <div class="mb-3">
            <label for="username" class="form-label">Name</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter username" name="name" value="{{ old('username') }}" required>
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror  
        </div>
    
        <div class="mb-3">
            <label for="userpassword" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" placeholder="Enter password" name="password" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror       
        </div>
    
        <div class="mb-3">
            <label for="userpassword-confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="userpassword-confirmation" placeholder="Enter password" name="password_confirmation" required>
            <div class="invalid-feedback">
                Please confirm your password
            </div>       
        </div>
    
        <div class="mt-4 d-grid">
            <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
        </div>
    </form>
    
    
</x-auth>