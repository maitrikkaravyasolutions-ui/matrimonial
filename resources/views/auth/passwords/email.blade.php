@extends('layouts.user.auth')

@section('title')
Matrimonial| Reset Page
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('css/auth_pages.css') }}">
@endsection
@section('content')
  <div class="container forgot-page">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8">
            <div class="card forgot-shell">
              <div class="row g-0">
                <div class="col-12 col-lg-5">
                  <div class="forgot-brand-panel">
                    <a href="{{ route('/') }}" class="text-decoration-none text-white mb-2">
                        <h3 class="forgot-brand-title mb-2">Matrimonial</h3>
                    </a>
                    <p class="forgot-brand-subtitle">No worries. Reset your password securely and continue your match journey.</p>
                    <ul class="forgot-brand-points">
                        <li><i class="bi bi-shield-lock"></i> Secure reset process</li>
                        <li><i class="bi bi-envelope-check"></i> Instant email recovery</li>
                        <li><i class="bi bi-person-check"></i> Quick account access</li>
                    </ul>
                  </div>
                </div>

                <div class="col-12 col-lg-7">
                  <div class="forgot-form-panel">
                  <h5 class="forgot-heading">Forgot Password</h5>
                  <p class="forgot-subheading">Enter your registered email to receive a password reset link.</p>

                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  <form method="POST" action="{{ route('password.email') }}">
                      @csrf
                  <div class="mb-3">
                    <label for="email" class="forgot-label">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary btn-forgot">
                            {{ __('Send Password Reset Link') }}
                        </button>
                  </div>
                </form>

                <p class="mb-1 forgot-links">
                  @if (Route::has('password.request'))
                      <a href="{{ route('login') }}">
                          {{ __('Login?') }}
                      </a>
                  @endif
                </p>
              </div>
                </div>
              </div>
              <!-- /.login-card-body -->
            </div>

          </div>
      </div>
  </div>
@endsection