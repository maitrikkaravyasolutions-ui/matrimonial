@extends('layouts.user.auth')

@section('title')
Matrimonial| Register Page
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/auth_pages.css') }}">
@endsection

@section('content')
<div class="container register-page">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-11 col-md-10 col-lg-10 col-xl-9">
            <div class="card register-shell">
                <div class="row g-0">
                    <div class="col-12 col-lg-5">
                        <div class="register-brand-panel">
                            <a href="{{ route('/') }}" class="text-decoration-none text-white mb-2">
                                <h3 class="register-brand-title mb-2">Matrimonial</h3>
                            </a>
                            <p class="register-brand-subtitle">Create your account and begin your journey to finding your ideal life partner.</p>
                            <ul class="register-brand-points">
                                <li><i class="bi bi-patch-check"></i> Easy profile setup</li>
                                <li><i class="bi bi-shield-lock"></i> Safe and secure platform</li>
                                <li><i class="bi bi-people"></i> Quality verified profiles</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="register-form-panel">
                            <h5 class="register-heading">Create Account</h5>
                            <p class="register-subheading">Fill in your details to get started.</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <label for="first_name" class="register-label">{{ __('First Name') }}*</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="middle_name" class="register-label">{{ __('Middle Name') }}</label>
                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name" autofocus>

                                @error('middle_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="last_name" class="register-label">{{ __('Last Name') }}*</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="email" class="register-label">{{ __('Email') }}*</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="phone_number" class="register-label">Mobile No*</label>
                                <input
                                    type="text"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    id="phone_number"
                                    name="phone_number"
                                    value="{{ old('phone_number') }}"
                                />
                                @error('phone_number')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="password" class="register-label">{{ __('Password') }}*</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="password-confirm" class="register-label">{{ __('Confirm Password') }}*</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-register">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <p class="mb-1 register-links">
                          <a href="{{ route('login') }}">
                              {{ __('Sign In?') }}
                          </a>
                        </p>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection