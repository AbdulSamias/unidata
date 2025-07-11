<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <!-- ✅ Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5" style="max-width: 600px;">
        <h2 class="mb-4 text-center">User Signup</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <!-- ✅ Signup Form -->
        <form method="POST" action="{{ route('signup.submit') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Cell Phone</label>
                <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror"
                    value="{{ old('mobile') }}" required>
                @error('mobile')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    <option value="">--Select--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control @error('mobile') is-invalid @enderror"
                    value="{{ old('mobile') }}" required>
                @error('dob')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Your Age (Auto-Calculated)</label>
                <input type="text" id="age" class="form-control" readonly>
                @error('age')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>


            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
                @error('password_confirmation')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
        </form>
    </div>

    <!-- ✅ Bootstrap JS (optional, if using dropdowns, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dobInput = document.getElementById('dob');
        const ageInput = document.getElementById('age');

        function calculateAge(dobStr) {
            const dob = new Date(dobStr);
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const m = today.getMonth() - dob.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            return isNaN(age) ? '' : age;
        }

        dobInput.addEventListener('change', function () {
            ageInput.value = calculateAge(this.value);
        });

        // Auto-fill age if DOB was already filled (e.g., old input)
        if (dobInput.value) {
            ageInput.value = calculateAge(dobInput.value);
        }
    });
</script>

</html>