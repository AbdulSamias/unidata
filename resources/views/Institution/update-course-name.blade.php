    @extends('layouts.app')
    @section('update-course-detail-form')
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="{{ asset('css/course-form.css') }}">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <title>Add Course Names</title>
        </head>

        <body>

            <div class="form-container">
                <div class="header-container">
                    <div class="logo">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h1 class="form-title">University Course Management</h1>
                    <p class="form-subtitle">Add new courses to university programs</p>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h1 class="text-white">
                            <i class="fas fa-book me-2"></i>Update Course Information
                        </h1>
                    </div>
                    <div class="card-body p-4">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('update.course.name.form.submit', $course->id) }}" method="POST">
                            @csrf @method('PUT')
                            <!-- University Info -->
                            <div class="university-info">
                                <i class="fas fa-university"></i>
                                <div>
                                    <h5 class="mb-1">University Name</h5>
                                    <p class="mb-0 fs-5">{{ $university->university_name }}</p>
                                </div>

                            </div>
                            <input type="hidden" name="university_id" value="{{ $university->id }}">

                            <!-- Course Name -->
                            <div class="form-section">
                                <label for="course_name" class="form-label">Course Name</label>
                                <div class="input-icon">
                                    <i class="fas fa-book-open"></i>
                                    <input type="text" class="form-control" value="{{ $course->course_name }}"
                                        id="course_name" name="course_name" placeholder="e.g., BSc Computer Science"
                                        required>
                                </div>
                                <div class="error-message text-danger">
                                    @error('course_name')
                                        <i class="fas fa-exclamation-circle me-2"></i>{{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <!-- Course Seats -->
                            <div class="form-section">
                                <label for="course_seats" class="form-label">Course Seats</label>
                                <div class="input-icon">
                                    <i class="fas fa-users"></i>
                                    <input type="number" class="form-control" value="{{ $course->course_seats }}"
                                        id="course_seats" name="course_seats" placeholder="e.g., 60" required>
                                </div>
                                <div class="error-message text-danger">
                                    @error('course_seats')
                                        <i class="fas fa-exclamation-circle me-2"></i>{{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <a href="#" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Back
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-check me-2"></i>Submit Details
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="text-center text-muted mt-4">
                    <p>© 2023 University Management System. All rights reserved.</p>
                </div>
            </div>
        </body>

        </html>
    @endsection
