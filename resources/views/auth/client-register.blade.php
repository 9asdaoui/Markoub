@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="row g-0">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <div class="h-100 d-flex flex-column justify-content-center text-white p-5">
                            <h2 class="display-6 fw-bold mb-4">Join Our Community</h2>
                            <p class="mb-4">Create an account to start booking rides, tracking your journeys, and enjoying special promotions.</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-center mb-4">
                                    <div class="px-3">
                                        <i class="fas fa-shield-alt fa-2x"></i>
                                        <p class="small mt-2">Secure Platform</p>
                                    </div>
                                    <div class="px-3">
                                        <i class="fas fa-hand-holding-usd fa-2x"></i>
                                        <p class="small mt-2">Best Prices</p>
                                    </div>
                                    <div class="px-3">
                                        <i class="fas fa-headset fa-2x"></i>
                                        <p class="small mt-2">24/7 Support</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card-body p-md-5">
                            <div class="d-flex align-items-center mb-4">
                                <i class="fas fa-user-plus text-primary fa-2x me-3"></i>
                                <h3 class="fw-bold m-0">{{ __('Client Registration') }}</h3>
                            </div>
                            
                            <p class="text-muted mb-4">Please fill in your information to create your account</p>
                            
                            <form method="POST" action="{{ route('client.register') }}" class="needs-validation" novalidate>
                                @csrf

                                <div class="row g-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">{{ __('Full Name') }} <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your full name">
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
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="your.email@example.com">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">{{ __('Phone Number') }} <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="tel" placeholder="+1234567890">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="address" class="form-label">{{ __('Address') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" placeholder="Your address">
                                            @error('address')
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
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                <i class="far fa-eye"></i>
                                            </button>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="password-strength mt-2" id="password-strength"></div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                                <i class="far fa-eye"></i>
                                            </button>
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
                                        <i class="fas fa-user-plus me-2"></i>{{ __('Create Account') }}
                                    </button>
                                </div>
                                
                                <div class="text-center mt-4">
                                    <p class="text-muted">Already have an account? <a href="{{ route('login.form') }}" class="text-primary fw-bold">Login here</a></p>
                                </div>
                                
                                <div class="d-flex align-items-center my-4">
                                    <hr class="flex-grow-1">
                                    <span class="mx-3 text-muted">or register with</span>
                                    <hr class="flex-grow-1">
                                </div>
                                
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="#" class="btn btn-outline-secondary px-3">
                                        <i class="fab fa-google"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-secondary px-3">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-secondary px-3">
                                        <i class="fab fa-apple"></i>
                                    </a>
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
        background: linear-gradient(135deg, #3b82f6, #1e40af);
        position: relative;
    }
    
    .bg-register-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://images.unsplash.com/photo-1557180295-76eee20ae8aa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80') no-repeat center center;
        background-size: cover;
        opacity: 0.2;
    }
    
    .form-control {
        padding: 0.6rem 0.75rem;
        border-radius: 5px;
    }
    
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
        border-color: #3b82f6;
    }
    
    .input-group-text {
        background-color: #f8f9fa;
        border-right: 0;
    }
    
    .form-control:not(:last-child) {
        border-right: 0;
    }
    
    .btn-primary {
        background-color: #3b82f6;
        border: none;
        border-radius: 5px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #2563eb;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
    }
    
    .btn-outline-secondary {
        border-color: #dee2e6;
        color: #6c757d;
    }
    
    .btn-outline-secondary:hover {
        background-color: #f8f9fa;
    }
    
    .password-strength {
        height: 5px;
        border-radius: 5px;
        transition: all 0.3s ease;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const togglePassword = document.querySelector('#togglePassword');
    const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
    const password = document.querySelector('#password');
    const confirmPassword = document.querySelector('#password-confirm');
    const passwordStrength = document.querySelector('#password-strength');
    
    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
    
    toggleConfirmPassword.addEventListener('click', function() {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
    
    // Password strength indicator
    password.addEventListener('input', function() {
        const value = password.value;
        let strength = 0;
        
        if (value.length >= 6) strength += 1;
        if (value.length >= 10) strength += 1;
        if (/[A-Z]/.test(value)) strength += 1;
        if (/[0-9]/.test(value)) strength += 1;
        if (/[^A-Za-z0-9]/.test(value)) strength += 1;
        
        const width = (strength / 5) * 100;
        let color = '';
        
        if (width <= 30) color = '#dc3545';
        else if (width <= 60) color = '#ffc107';
        else color = '#198754';
        
        passwordStrength.style.width = width + '%';
        passwordStrength.style.backgroundColor = color;
    });
    
    // Form validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});
</script>
@endsection