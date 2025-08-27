<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Password Reset | Account Recovery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        body:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 10% 20%, rgba(255,255,255,0.05) 0%, transparent 15%),
                radial-gradient(circle at 90% 80%, rgba(255,255,255,0.05) 0%, transparent 15%),
                radial-gradient(circle at 50% 50%, rgba(255,255,255,0.05) 0%, transparent 20%);
            z-index: -1;
        }
        
        .container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 1000px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            position: relative;
            z-index: 1;
            margin: 40px auto;
        }
        
        .header {
            background: linear-gradient(to right, rgba(106, 17, 203, 0.8), rgba(37, 117, 252, 0.8));
            color: white;
            padding: 30px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .header:before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 40%),
                linear-gradient(45deg, transparent 49%, rgba(255,255,255,0.1) 50%, transparent 51%),
                linear-gradient(-45deg, transparent 49%, rgba(255,255,255,0.1) 50%, transparent 51%);
            background-size: 100px 100px;
            opacity: 0.3;
            z-index: -1;
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .content {
            padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            overflow-y: auto;
            max-height: 70vh;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: white;
        }
        
        .logo i {
            font-size: 36px;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #2c3e50;
            position: relative;
            font-size: 28px;
        }
        
        .subtitle {
            text-align: center;
            color: #7f8c8d;
            margin-bottom: 30px;
            font-size: 16px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #34495e;
            font-size: 15px;
        }
        
        input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e5ee;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s;
            background: white;
        }
        
        input:focus {
            outline: none;
            border-color: #6a11cb;
            box-shadow: 0 0 0 4px rgba(106, 17, 203, 0.15);
        }
        
        .input-icon {
            position: absolute;
            right: 20px;
            top: 45px;
            color: #7f8c8d;
            font-size: 18px;
        }
        
        .password-container {
            position: relative;
        }
        
        .password-toggle {
            position: absolute;
            right: 20px;
            top: 45px;
            cursor: pointer;
            color: #7f8c8d;
            font-size: 18px;
        }
        
        .btn-submit {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 17px;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(106, 17, 203, 0.3);
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }
        
        .btn-submit:hover {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(106, 17, 203, 0.4);
        }
        
        .btn-submit:after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
        }
        
        .btn-submit:hover:after {
            animation: shine 1.5s ease;
        }
        
        @keyframes shine {
            0% { transform: rotate(30deg) translate(-50%, -50%); }
            100% { transform: rotate(30deg) translate(100%, 100%); }
        }
        
        .back-to-login {
            text-align: center;
            margin-top: 20px;
            color: #7f8c8d;
        }
        
        .back-to-login a {
            color: #6a11cb;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .back-to-login a:hover {
            text-decoration: underline;
            color: #2575fc;
        }
        
        .benefits {
            list-style-type: none;
            margin-top: 30px;
            text-align: left;
            padding: 0 20px;
        }
        
        .benefits li {
            margin-bottom: 18px;
            padding-left: 35px;
            position: relative;
            font-size: 17px;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.9);
        }
        
        .benefits li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #2ecc71;
            font-weight: bold;
            font-size: 22px;
        }
        
        .illustration {
            margin: 20px auto;
            width: 80%;
            max-width: 200px;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            color: rgba(255, 255, 255, 0.9);
            filter: drop-shadow(0 5px 10px rgba(0,0,0,0.2));
        }
        
        .form-section {
            display: none;
            animation: fadeIn 0.5s ease;
        }
        
        .form-section.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .success-message {
            background: linear-gradient(to right, rgba(212, 237, 218, 0.9), rgba(212, 237, 218, 0.7));
            color: #155724;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            text-align: center;
            display: none;
            border-left: 5px solid #28a745;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .success-message i {
            margin-right: 10px;
            font-size: 24px;
        }
        
        .password-strength {
            height: 8px;
            background-color: #eee;
            border-radius: 4px;
            margin-top: 12px;
            overflow: hidden;
            position: relative;
        }
        
        .strength-meter {
            height: 100%;
            width: 0;
            background-color: #e74c3c;
            transition: width 0.4s ease;
        }
        
        .strength-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 8px;
            font-size: 13px;
            color: #7f8c8d;
        }
        
        .steps-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }
        
        .step {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #e1e5ee;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #7f8c8d;
            position: relative;
            z-index: 2;
            transition: all 0.4s ease;
        }
        
        .step.active {
            background: #6a11cb;
            color: white;
            transform: scale(1.1);
            box-shadow: 0 0 0 5px rgba(106, 17, 203, 0.2);
        }
        
        .step.completed {
            background: #2ecc71;
            color: white;
        }
        
        .step-line {
            position: absolute;
            top: 18px;
            left: 0;
            height: 4px;
            background: #e1e5ee;
            width: 100%;
            z-index: 1;
        }
        
        .progress-line {
            position: absolute;
            top: 18px;
            left: 0;
            height: 4px;
            background: #6a11cb;
            width: 0;
            z-index: 1;
            transition: width 0.5s ease;
        }
        
        .token-timer {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 12px 15px;
            text-align: center;
            margin-bottom: 20px;
            border: 2px dashed #e1e5ee;
            font-weight: 600;
            color: #6a11cb;
        }
        
        .security-tip {
            background: rgba(106, 17, 203, 0.05);
            border-radius: 10px;
            padding: 15px;
            margin-top: 20px;
            border-left: 4px solid #6a11cb;
            font-size: 14px;
            color: #555;
        }
        
        .security-tip i {
            color: #6a11cb;
            margin-right: 8px;
        }
        
        .welcome-text {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.3;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        @media (max-width: 768px) {
            .container {
                margin: 20px;
            }
            
            .header {
                padding: 25px 20px;
            }
            
            .content {
                padding: 30px 20px;
            }
            
            .steps-indicator {
                margin-bottom: 20px;
            }
            
            .step {
                width: 30px;
                height: 30px;
                font-size: 14px;
            }
            
            .step-line, .progress-line {
                top: 15px;
                height: 3px;
            }
            
            .welcome-text {
                font-size: 24px;
            }
            
            .benefits li {
                font-size: 15px;
            }
        }
        
        @media (max-width: 480px) {
            .step {
                width: 26px;
                height: 26px;
                font-size: 12px;
            }
            
            .step-line, .progress-line {
                top: 13px;
            }
            
            .content {
                max-height: 65vh;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <i class="fas fa-shield-alt"></i>
                <span>SecureAccount</span>
            </div>
            <h1 class="welcome-text">Secure Password Recovery</h1>
            <div class="illustration">
                <i class="fas fa-lock"></i>
            </div>
            <ul class="benefits">
                <li>Military-grade encryption for your password</li>
                <li>Instant password reset process</li>
                <li>24/7 security monitoring</li>
            </ul>
        </div>
        
        <div class="content">
            <h2>Reset Your Password</h2>
            <p class="subtitle">Follow these steps to securely reset your account password</p>
            
            <div class="steps-indicator">
                <div class="step active">1</div>
                <div class="step">2</div>
                <div class="step">3</div>
                <div class="step-line"></div>
                <div class="progress-line" id="progressLine"></div>
            </div>
            
            <div class="form-section active" id="step1-section">
                <div class="success-message" id="request-success">
                    <i class="fas fa-check-circle"></i>
                    Password reset link sent to your email!
                </div>
                
                <form id="requestForm">
                    <div class="form-group">
                        <label for="email">Enter Your Email Address</label>
                        <input type="email" id="email" placeholder="your.email@example.com" required>
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                    
                    <div class="security-tip">
                        <i class="fas fa-info-circle"></i>
                        We'll send a 6-digit verification code to your email for security verification.
                    </div>
                    
                    <button type="submit" class="btn-submit">Send Verification Code</button>
                </form>
                
                <div class="back-to-login">
                    Remember your password? <a href="#">Sign In</a>
                </div>
            </div>
            
            <div class="form-section" id="step2-section">
                <div class="token-timer">
                    <i class="fas fa-clock"></i> Code expires in: <span id="timer">05:00</span>
                </div>
                
                <form id="verifyForm">
                    <div class="form-group">
                        <label for="token">Enter 6-Digit Verification Code</label>
                        <input type="text" id="token" placeholder="123456" maxlength="6" required>
                        <i class="fas fa-key input-icon"></i>
                    </div>
                    
                    <div class="form-group">
                        <label for="auth-method">Select Verification Method</label>
                        <select id="auth-method" class="form-control" style="width: 100%; padding: 15px 20px; border: 2px solid #e1e5ee; border-radius: 12px; font-size: 16px; background: white;">
                            <option value="email">Email Verification</option>
                            <option value="sms">SMS Verification</option>
                            <option value="authenticator">Authenticator App</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn-submit">Verify Code</button>
                </form>
                
                <div class="back-to-login">
                    Didn't receive the code? <a href="#" id="resend-code">Resend Code</a>
                </div>
            </div>
            
            <div class="form-section" id="step3-section">
                <div class="success-message" id="reset-success">
                    <i class="fas fa-check-circle"></i>
                    Password updated successfully!
                </div>
                
                <form id="resetForm">
                    <div class="form-group">
                        <label for="new-password">Create New Password</label>
                        <div class="password-container">
                            <input type="password" id="new-password" placeholder="Create a strong password" required>
                            <span class="password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <div class="password-strength">
                            <div class="strength-meter" id="strengthMeter"></div>
                        </div>
                        <div class="strength-labels">
                            <span>Weak</span>
                            <span>Medium</span>
                            <span>Strong</span>
                            <span>Very Strong</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm-password">Confirm New Password</label>
                        <div class="password-container">
                            <input type="password" id="confirm-password" placeholder="Confirm your new password" required>
                            <span class="password-toggle" id="toggleConfirmPassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <div class="security-tip">
                        <i class="fas fa-lightbulb"></i>
                        Use at least 12 characters with a mix of uppercase, lowercase, numbers & symbols
                    </div>
                    
                    <button type="submit" class="btn-submit">Update Password</button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        // Current step tracking
        let currentStep = 1;
        const progressLine = document.getElementById('progressLine');
        const steps = document.querySelectorAll('.step');
        
        // Update progress line and steps
        function updateProgress(step) {
            // Update steps
            steps.forEach((s, index) => {
                if (index < step - 1) {
                    s.classList.add('completed');
                    s.classList.remove('active');
                } else if (index === step - 1) {
                    s.classList.add('active');
                    s.classList.remove('completed');
                } else {
                    s.classList.remove('active', 'completed');
                }
            });
            
            // Update progress line
            const progressPercentage = ((step - 1) / (steps.length - 1)) * 100;
            progressLine.style.width = `${progressPercentage}%`;
            
            // Update current step
            currentStep = step;
        }
        
        // Move to next step
        function nextStep() {
            const nextStep = currentStep + 1;
            if (nextStep <= steps.length) {
                // Hide current section
                document.querySelector(`#step${currentStep}-section`).classList.remove('active');
                
                // Show next section
                document.querySelector(`#step${nextStep}-section`).classList.add('active');
                
                // Update progress
                updateProgress(nextStep);
                
                // Start timer when step 2 is activated
                if (nextStep === 2) {
                    startTimer();
                }
            }
        }
        
        // Timer functionality for step 2
        let timerInterval;
        function startTimer() {
            let timeLeft = 5 * 60; // 5 minutes in seconds
            const timerDisplay = document.getElementById('timer');
            
            timerInterval = setInterval(() => {
                timeLeft--;
                
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    timerDisplay.textContent = "00:00";
                    document.querySelector('.token-timer').innerHTML = 
                        '<i class="fas fa-exclamation-triangle"></i> Verification code has expired';
                    document.querySelector('.token-timer').style.color = '#e74c3c';
                    document.getElementById('token').disabled = true;
                    return;
                }
                
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerDisplay.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            }, 1000);
        }
        
        // Password visibility toggle
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const passwordInput = document.getElementById('new-password');
        const confirmPasswordInput = document.getElementById('confirm-password');
        
        if (togglePassword) {
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        }
        
        if (toggleConfirmPassword) {
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordInput.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        }
        
        // Password strength meter
        const password = document.getElementById('new-password');
        const strengthMeter = document.getElementById('strengthMeter');
        
        if (password) {
            password.addEventListener('input', function() {
                const passwordValue = this.value;
                let strength = 0;
                
                // Check password length
                if (passwordValue.length >= 8) strength += 25;
                if (passwordValue.length >= 12) strength += 15;
                
                // Check for lowercase letters
                if (/[a-z]/.test(passwordValue)) strength += 15;
                
                // Check for uppercase letters
                if (/[A-Z]/.test(passwordValue)) strength += 15;
                
                // Check for numbers
                if (/[0-9]/.test(passwordValue)) strength += 15;
                
                // Check for special characters
                if (/[!@#$%^&*]/.test(passwordValue)) strength += 15;
                
                // Cap at 100
                strength = Math.min(strength, 100);
                
                // Update strength meter
                strengthMeter.style.width = `${strength}%`;
                
                // Update color based on strength
                if (strength < 40) {
                    strengthMeter.style.backgroundColor = '#e74c3c';
                } else if (strength < 70) {
                    strengthMeter.style.backgroundColor = '#f39c12';
                } else if (strength < 90) {
                    strengthMeter.style.backgroundColor = '#2ecc71';
                } else {
                    strengthMeter.style.backgroundColor = '#27ae60';
                }
            });
        }
        
        // Form submission handlers
        const requestForm = document.getElementById('requestForm');
        const verifyForm = document.getElementById('verifyForm');
        const resetForm = document.getElementById('resetForm');
        const requestSuccess = document.getElementById('request-success');
        const resetSuccess = document.getElementById('reset-success');
        const resendLink = document.getElementById('resend-code');
        
        if (requestForm) {
            requestForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading effect on button
                const btn = this.querySelector('.btn-submit');
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
                btn.disabled = true;
                
                // Simulate sending reset email
                setTimeout(() => {
                    requestSuccess.style.display = 'block';
                    btn.innerHTML = 'Send Verification Code';
                    btn.disabled = false;
                    
                    // Move to next step after delay
                    setTimeout(nextStep, 1500);
                }, 2000);
            });
        }
        
        if (verifyForm) {
            verifyForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const token = document.getElementById('token').value;
                
                if (token.length !== 6 || isNaN(token)) {
                    alert("Please enter a valid 6-digit code");
                    return;
                }
                
                // Clear timer if valid
                clearInterval(timerInterval);
                
                // Move to next step
                nextStep();
            });
        }
        
        if (resetForm) {
            resetForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const passwordValue = document.getElementById('new-password').value;
                const confirmPassword = document.getElementById('confirm-password').value;
                
                if (passwordValue !== confirmPassword) {
                    alert("Passwords don't match!");
                    return;
                }
                
                if (passwordValue.length < 8) {
                    alert("Password must be at least 8 characters long");
                    return;
                }
                
                // Show success message
                resetSuccess.style.display = 'block';
                resetForm.reset();
                strengthMeter.style.width = '0';
                
                // Show success for 3 seconds then simulate redirect
                setTimeout(() => {
                    alert("Password has been successfully reset! Redirecting to login...");
                    window.location.href = "#";
                }, 2000);
            });
        }
        
        if (resendLink) {
            resendLink.addEventListener('click', function(e) {
                e.preventDefault();
                alert("New verification code has been sent to your email");
                clearInterval(timerInterval);
                startTimer();
            });
        }
        
        // Initialize the progress
        updateProgress(1);
    </script>
</body>
</html>