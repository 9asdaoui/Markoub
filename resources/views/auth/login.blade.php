@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="row g-0">
                    <div class="col-lg-5 d-none d-lg-block bg-login-image">
                        <div class="h-100 d-flex flex-column justify-content-center text-white p-5">
                            <h2 class="display-6 fw-bold mb-4">Welcome Back!</h2>
                            <p class="mb-4">Sign in to access your account and enjoy our transportation services.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-center mb-4">
                                    <div class="px-3">
                                        <i class="fas fa-route fa-2x"></i>
                                        <p class="small mt-2">Plan Trips</p>
                                    </div>
                                    <div class="px-3">
                                        <i class="fas fa-bus fa-2x"></i>
                                        <p class="small mt-2">Book Rides</p>
                                    </div>
                                    <div class="px-3">
                                        <i class="fas fa-history fa-2x"></i>
                                        <p class="small mt-2">View History</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card-body p-md-5">
                            <div class="d-flex align-items-center mb-4">
                                <i class="fas fa-user-circle text-primary fa-2x me-3"></i>
                                <h3 class="fw-bold m-0">{{ __('Sign In') }}</h3>
                            </div>
                            
                            <p class="text-muted mb-4">Enter your credentials to access your account</p>
                            
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            
                            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                                @csrf

                                <div class="mb-4">
                                    <label for="email" class="form-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your@email.com">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="d-flex justify-content-between">
                                        <label for="password" class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>
                                        <a href="#" class="text-primary small">{{ __('Forgot Password?') }}</a>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <div class="d-grid gap-2 mb-4">
                                    <button type="submit" class="btn btn-primary py-2">
                                        <i class="fas fa-sign-in-alt me-2"></i>{{ __('Sign In') }}
                                    </button>
                                </div>
                                
                                <div class="text-center">
                                    <p class="text-muted mb-3">{{ __('Or sign in with') }}</p>
                                    <div class="d-flex justify-content-center gap-3 mb-4">
                                        <a href="#" class="btn btn-outline-secondary">
                                            <i class="fab fa-google"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-secondary">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </div>
                                    <p class="text-muted">{{ __('Don\'t have an account?') }} 
                                        <a href="{{ route('register') }}" class="text-primary fw-bold">{{ __('Register here') }}</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }
    
    .bg-login-image {
        background: linear-gradient(135deg, #3f51b5, #1a237e);
        position: relative;
    }
    
    .bg-login-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80') no-repeat center center;
        background-size: cover;
        opacity: 0.2;
    }
    
    .form-control {
        padding: 0.6rem 0.75rem;
        border-radius: 5px;
    }
    
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(63, 81, 181, 0.25);
        border-color: #3f51b5;
    }
    
    .input-group-text {
        background-color: #f8f9fa;
        border-right: 0;
    }
    
    .form-control:not(:last-child) {
        border-right: 0;
    }
    
    .btn-primary {
        background-color: #3f51b5;
        border: none;
        border-radius: 5px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #303f9f;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(48, 63, 159, 0.3);
    }
    
    .btn-outline-secondary {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .btn-outline-secondary:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection