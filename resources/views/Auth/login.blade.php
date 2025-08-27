    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Professional Login Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <style>

        </style>
    </head>

    <body>
        <div class="container">
            <div class="login-illustration">
                <h2>Welcome Back!</h2>
                <p>Sign in to access your personalized dashboard and continue your journey with us.</p>

                <div class="features">
                    <div class="feature">
                        <i class="fas fa-shield-alt"></i>
                        <div class="feature-content">
                            <h4>Secure Access</h4>
                            <p>Enterprise-grade security to protect your data</p>
                        </div>
                    </div>

                    <div class="feature">
                        <i class="fas fa-sync-alt"></i>
                        <div class="feature-content">
                            <h4>Sync Across Devices</h4>
                            <p>Access your account from anywhere</p>
                        </div>
                    </div>

                    <div class="feature">
                        <i class="fas fa-bolt"></i>
                        <div class="feature-content">
                            <h4>Lightning Fast</h4>
                            <p>Optimized for the best performance</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="login-form-container">
                <div class="logo">
                    <i class="fas fa-lock"></i>
                    <h3>SecureLogin</h3>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="text-center mb-4">Login to Your Account</h3>

                        <!-- Success Message -->
                        <div class="alert alert-success">
                            Your account has been created successfully!
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <form method="POST" action="{{route('login.submit')}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <div class="input-group">
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email"
                                            required autofocus placeholder="Enter your email">
                                    </div>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <i class="fas fa-lock"></i>
                                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}"
                                            required placeholder="Enter your password">
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>

                                <button type="submit" class="btn btn-primary">Login</button>

                                <div class="text-center mt-4">
                                    <a href="/register">Don't have an account? Register</a>
                                    <a href="/forgot-password">Forgot your password?</a>
                                </div>

                                <div class="divider">
                                    <span>Or continue with</span>
                                </div>

                                <div class="social-login">
                                    <button type="button" class="social-btn google">
                                        <i class="fab fa-google"></i>
                                    </button>
                                    <button type="button" class="social-btn facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button type="button" class="social-btn twitter">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>
