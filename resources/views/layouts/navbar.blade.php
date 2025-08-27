<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Navigation Bar</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>

    </style>
</head>

<body>
    <!-- Enhanced Professional Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
          @can('isAdmin')
             <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-layers"></i> Edu_Manage
            </a>
            @else
             <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-layers"></i> {{auth()->user()->role}}_Manage
            </a>
          @endcan
           
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto d-flex justify-content-between w-100">
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dashboard <i class="bi bi-person-circle"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                @can('isAdmin')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            Dashboard
                                        </a>
                                    </li>
                                @endcan

                                <li>
                                    <a class="dropdown-item" href="{{ route('student.dashboard') }}">
                                        Student Dashboard
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <li class="nav-item me-lg-3 active">
                            <span class="active-indicator"></span>
                            <a class="nav-link" href="{{ route('all.university.names') }}">
                                <i class="bi bi-building"></i> Universities
                            </a>
                        </li>
                        <li class="nav-item me-lg-3">
                            <span class="active-indicator"></span>
                            <a class="nav-link" href="{{ route('show.mail') }}">
                                <i class="bi bi-envelope"></i> Send Email
                            </a>
                        </li>

                    </div>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }} <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('change.password.show.form') }}">
                                    Change Password
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add active class on click
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.nav-item').forEach(item => {
                    item.classList.remove('active');
                });
                this.parentElement.classList.add('active');
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.padding = "0.5rem 1rem";
                navbar.style.boxShadow = "0 2px 10px rgba(0, 0, 0, 0.1)";
            } else {
                navbar.style.padding = "0.8rem 1rem";
                navbar.style.boxShadow = "0 4px 12px rgba(0, 0, 0, 0.15)";
            }
        });
    </script>
</body>
