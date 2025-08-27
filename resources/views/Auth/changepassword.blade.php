<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Password Change</title>
    <link rel="stylesheet" href="{{ asset('css/change-password.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <i class="fas fa-lock"></i>
                <span>SecureAccount</span>
            </div>
            <h1 class="welcome-text">Update Your Password</h1>
            <p style="color: rgba(255,255,255,0.9);">Secure your account with a new password</p>
        </div>

        <div class="content">
            <h2>Change Password</h2>
            <p class="subtitle">Create a strong and secure new password</p>


            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form id="password-form" action="{{ route('change.password.submit.form') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="currentpassword">Current Password</label>
                    <div class="password-container">
                        <input type="password" id="currentpassword" name="currentpassword" value="{{ old('currentpassword') }}"
                            placeholder="Enter your current password" required>
                        <span class="password-toggle" id="toggleCurrentPassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('currentpassword')
                        <div class="bg-warning">
                            <small class="text-danger">Incorrect Current Password </small>
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="newpassword">New Password</label>
                    <div class="password-container">
                        <input type="password" id="newpassword" name="newpassword" value="{{ old('newpassword') }}"
                            placeholder="Create a strong password" required>
                        <span class="password-toggle" id="toggleNewPassword">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="newpassword_confirmation">Confirm New Password</label>
                        <div class="password-container">
                            <input type="password" id="newpassword_confirmation" name="newpassword_confirmation" value="{{ old('newpassword_confirmation') }}"
                                placeholder="Confirm your new password" required>
                            <span class="password-toggle" id="toggleConfirmPassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <div id="password-match" class="password-criteria" style="display: none; color: #e74c3c;">
                            @error('newpassword_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="security-tip">
                        <i class="fas fa-lightbulb"></i>
                        For maximum security, use a unique password that you don't use anywhere else.
                    </div>

                    <button type="submit" class="btn-submit">Update Password</button>
            </form>

            <div class="back-to-login">
                <a href="#"><i class="fas fa-arrow-left"></i> Back to account settings</a>
            </div>
        </div>
    </div>


</body>


</html>
