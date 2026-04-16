@extends('layouts.user.auth')

@section('title')
Matrimonial| Verify Email
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
                            <p class="login-brand-subtitle">Almost there. Verify your email to activate your account and continue your journey.</p>
                            <ul class="login-brand-points">
                                <li><i class="bi bi-envelope-check"></i> Verify your email securely</li>
                                <li><i class="bi bi-shield-check"></i> Protect your account access</li>
                                <li><i class="bi bi-stars"></i> Unlock full platform features</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-lg-7">
                        <div class="login-form-panel">
                            <h5 class="login-heading">{{ __('Verify Your Email Address') }}</h5>
                            <p class="login-subheading mb-3">
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                            </p>

                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            <p class="mb-3" style="color:#7a5a66;">
                                {{ __('If you did not receive the email') }},
                            </p>

                            <form method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-login">
                                        {{ __('Click here to request another') }}
                                    </button>
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
