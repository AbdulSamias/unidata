@extends('layouts.app')
@section('title', 'University Courses')

@section('uni-courses')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/university-courses.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        
    </head>

    <body>
        <div class="py-4 border-bottom text-light" style="background-image: linear-gradient(90deg, #007bff, #6610f2);">
            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="text-center text-md-start mb-3 mb-md-0">
                
                    <h1 class="h3 fw-bold mb-1  text-light"><i class="bi p-3 bi-book"></i>{{ $university->university_name }}</h1>
                    <p class="mb-0 text-light">Available Courses & Programs</p>
                </div>
                <a href="{{ route('show.courses', $university->id) }}" class="btn btn-outline-light">
                    ➕ Add Courses
                </a>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row g-4">
                @foreach ($uni_courses as $course)
                    <div class="col-md-6 col-lg-4">
                        <div class="card-course">
                            <div class="card-header">
                                <i class="bi bi-journal-bookmark floating-icon"></i>
                                <h4 class="course-title">{{ $course->course_name }}</h4>
                            </div>

                            <div class="course-stats">
                                <div>
                                    <div class="stat-label">Course Seats</div>
                                </div>
                                <div class="stat-value">{{ $course->course_seats }}</div>
                            </div>
                            <div class="course-stats">
                                <div>
                                    <div class="stat-label">Enrolled Student</div>
                                </div>
                                <div class="stat-value">{{ $course->in_roll_student }}</div>
                            </div>
                            <div class="course-stats">
                                <div>
                                    <div class="stat-label">Available Seats</div>
                                </div>
                                <div class="stat-value">{{ $course->balance_seats }}</div>
                            </div>
                            <div class="action-buttons">
                                <a href="{{ route('course.detail', $course->id) }}" class="btn-action btn-details">
                                    <i class="bi bi-journal-text"></i> View Course Details
                                </a>

                                <a href="{{ route('show.courses.books.form', $course->id) }}" class="btn-action btn-books">
                                    <i class="bi bi-plus-circle"></i> Add Books
                                </a>

                                <a href="{{ route('update.course.name.form', $course->id) }}" class="btn-action btn-update">
                                    <i class="bi bi-pencil-square"></i> Update Course
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Add subtle animation to cards on page load
            document.addEventListener('DOMContentLoaded', function() {
                const cards = document.querySelectorAll('.card-course');

                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.opacity = "1";
                        card.style.transform = "translateY(0)";
                    }, 150 * index);
                });
            });
        </script>
    </body>

    </html>
@endsection
