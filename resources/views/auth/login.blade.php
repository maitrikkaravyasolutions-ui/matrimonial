@extends('layouts.user.auth')

@section('title')
Matrimonial| Login Page
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('css/auth_pages.css') }}">
@endsection
@section('content')
<div class="container login-page">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="card login-shell">
                <div class="row g-0">
                    <div class="col-12 col-lg-5">
                        <div class="login-brand-panel">
                            <a href="{{ route('/') }}" class="text-decoration-none text-white mb-2">
                                <h3 class="login-brand-title mb-2">Matrimonial</h3>
                            </a>
                            <p class="login-brand-subtitle">Welcome back! Sign in to continue your journey to finding a meaningful match.</p>
                            <ul class="login-brand-points">
                                <li><i class="bi bi-shield-check"></i> Secure account access</li>
                                <li><i class="bi bi-heart"></i> Personalized matches</li>
                                <li><i class="bi bi-stars"></i> Trusted community</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-lg-7">
                        <div class="login-form-panel">
                            <h5 class="login-heading">Sign In</h5>
                            <p class="login-subheading">Use your account credentials to continue.</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3">
                            <div class="input-group login-input-group">
                                <input id="email" type="email"
                                    class="form-control  @error('login') is-invalid @enderror"
                                    name="login" required value="{{ old('login') }}"
                                    placeholder="Email" autofocus>

                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                            </div>

                            @error('login')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <div class="input-group login-input-group">
                                <input id="password"  required type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    placeholder="Password"
                                    autocomplete="current-password">

                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                            </div>

                            @error('password')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary btn-login">
                                Sign In
                            </button>
                        </div>
                        <!-- Links -->
                        <div class="text-start login-links">
                            @if (Route::has('password.request'))
                                <a class="d-block mb-1" href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>

                                <a href="{{ route('register') }}">
                                    Sign Up?
                                </a>
                            @endif
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection