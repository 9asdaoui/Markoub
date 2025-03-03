@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="row g-0">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <div class="h-100 d-flex flex-column justify-content-center text-white p-5">
                            <h2 class="display-6 fw-bold mb-4">Business Partners</h2>
                            <p class="mb-4">Register your company and start offering your transportation services on our platform.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-center mb-4">
                                    <div class="px-3">
                                        <i class="fas fa-chart-line fa-2x"></i>
                                        <p class="small mt-2">Grow Revenue</p>
                                    </div>
                                    <div class="px-3">
                                        <i class="fas fa-users fa-2x"></i>
                                        <p class="small mt-2">More Customers</p>
                                    </div>
                                    <div class="px-3">
                                        <i class="fas fa-tools fa-2x"></i>
                                        <p class="small mt-2">Easy Management</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card-body p-md-5">
                            <div class="d-flex align-items-center mb-4">
                                <i class="fas fa-building text-primary fa-2x me-3"></i>
                                <h3 class="fw-bold m-0">{{ __('Company Registration') }}</h3>
                            </div>
                            
                            <p class="text-muted mb-4">Fill in your company details to join our platform</p>
                            <form method="POST" action="{{ route('register') }}?type=company" class="needs-validation" novalidate>
                                @csrf

                                <div class="row g-3">
                                    <!-- User Information -->
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">{{ __('Company Name') }} <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter company name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="company@example.com">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Company Information -->
                                    <div class="col-md-6 mb-3">
                                        <label for="address" class="form-label">{{ __('Address') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" placeholder="123 Business St">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="city" class="form-label">{{ __('City') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" placeholder="Your city">
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="country" class="form-label">{{ __('Country') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                            <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" autocomplete="country" placeholder="Your country">
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="postal_code" class="form-label">{{ __('Postal Code') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                            <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" autocomplete="postal-code" placeholder="12345">
                                            @error('postal_code')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="website" class="form-label">{{ __('Website') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                            <input id="website" type="url" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}" autocomplete="url" placeholder="https://www.example.com">
                                            @error('website')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="password" class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Min. 6 characters">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check mt-3 mb-4">
                                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="#" class="text-primary">Terms of Service</a> and <a href="#" class="text-primary">Privacy Policy</a>
                                    </label>
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary py-2">
                                        <i class="fas fa-building me-2"></i>{{ __('Register Company') }}
                                    </button>
                                </div>
                                
                                <div class="text-center mt-4">
                                    <p class="text-muted">Already have an account? <a href="{{ route('login.form') }}" class="text-primary fw-bold">Login here</a></p>
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
    
    .bg-register-image {
        background: linear-gradient(135deg, #3f51b5, #1a237e);
        position: relative;
    }
    
    .bg-register-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80') no-repeat center center;
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
</style>
@endsection