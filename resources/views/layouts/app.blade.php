<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', config('app.name', 'My App'))</title>

</head>

<body>
    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
            // Ya agar toastr use karte ho to:
            // toastr.error("{{ session('error') }}");
        </script>
    @endif

    <div>
        @include('layouts.navbar')
    </div>
    <div class="container mt-4">
        @yield('change-password')
    </div>
    <div class="container mt-4">
        @yield('all-university')
    </div>
    <div class="container mt-4">
        @yield('email')
    </div>
    <div class="container mt-4">
        @yield('add-uni-data')
    </div>
    <div class="container mt-4">
        @yield('course-detail')
    </div>
    <div class="container mt-4">
        @yield('uni-courses-form')
    </div>
    <div class="container mt-4">
        @yield('course-books-form')
    </div>
    <div class="container mt-4">
        @yield('uni-courses')
    </div>
    <div class="container mt-4">
        @yield('add-uni-form')
    </div>
    <div class="container mt-4">
        @yield('update-card')
    </div>
    <div class="container mt-4">
        @yield('add-book-detail')
    </div>
    <div class="container mt-4">
        @yield('course-detail-view')
    </div>
    <div class="container mt-4">
        @yield('uni-name-update-form')
    </div>
    <div class="container mt-4">
        @yield('update-course-detail-form')
    </div>
    <div class="container mt-4">
        @yield('update-course-books-form')
    </div>
    <div class="container mt-4">
        @yield('admin-dashboard')
    </div>
    <div class="container mt-4">
        @yield('student-universities')
    </div>
    <div class="container mt-4">
        @yield('student-dashboard')
    </div>
    <div class="container mt-4">
        @yield('University_roles')
    </div>
    <div class="container mt-4">
        @yield('roles_form')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
