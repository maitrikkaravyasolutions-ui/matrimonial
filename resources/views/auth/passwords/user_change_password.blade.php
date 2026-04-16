@extends('layouts.user.auth')

@section('title')
Matrimonial| Change Password
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
                            <p class="login-brand-subtitle">Update your password to keep your account secure and protected.</p>
                            <ul class="login-brand-points">
                                <li><i class="bi bi-shield-lock"></i> Protect your account</li>
                                <li><i class="bi bi-key"></i> Set a stronger password</li>
                                <li><i class="bi bi-check-circle"></i> Secure login access</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-lg-7">
                        <div class="login-form-panel">
                            <h5 class="login-heading">{{ __('Change Password') }}</h5>
                            <p class="login-subheading">Enter your current password and set a new one.</p>

                            <form action="{{ route('update-password') }}" method="POST">
                                @csrf

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @elseif (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <div class="input-group login-input-group">
                                        <input name="old_password" type="password" id="oldPasswordInput"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            placeholder="Old Password" required>
                                        <span class="input-group-text">
                                            <i class="bi bi-lock-fill"></i>
                                        </span>
                                    </div>
                                    @error('old_password')
                                        <div class="invalid-feedback d-block">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="input-group login-input-group">
                                        <input name="new_password" type="password" id="newPasswordInput"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            placeholder="New Password" required>
                                        <span class="input-group-text">
                                            <i class="bi bi-key-fill"></i>
                                        </span>
                                    </div>
                                    @error('new_password')
                                        <div class="invalid-feedback d-block">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="input-group login-input-group">
                                        <input name="new_password_confirmation" type="password" id="confirmNewPasswordInput"
                                            class="form-control"
                                            placeholder="Confirm New Password" required>
                                        <span class="input-group-text">
                                            <i class="bi bi-shield-lock"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-login">Update Password</button>
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