    @extends('layouts.app')
    @section('title', 'Courses Detail')
    @section('course-detail')
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="{{ asset('css/course-detail.css') }}">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        </head>

        <body>
            <div class="container">
                <div class="header">
                    <div class="logo">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h1>Course Details</h1>
                    <p>Comprehensive information about the academic program and enrollment details</p>
                </div>

                <div class="course-card">
                    <div class="course-header">
                        <h2 class="course-title"><span class="fw-light">{{ $course->course_name }}</span></h2>
                        <p class="course-info">A comprehensive program focusing on software development, algorithms, and
                            computer systems</p>

                        <div class="course-meta">
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>4 Years Duration</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-certificate"></i>
                                <span>Undergraduate Degree</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-language"></i>
                                <span>English Taught</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-globe"></i>
                                <span>On-campus & Online</span>
                            </div>
                        </div>
                    </div>

                    <div class="course-body">
                        <div class="course-details">
                            <div class="section">
                                <h3 class="section-title"><i class="fas fa-info-circle"></i> Program Overview</h3>
                                <p class="description">
                                    The Bachelor of Science in Computer Science program provides students with a
                                    comprehensive
                                    foundation in computing principles and practices. This program combines theoretical
                                    knowledge with practical skills to prepare graduates for successful careers in software
                                    development, systems analysis, and technology innovation.
                                </p>
                                <p class="description">
                                    Students will engage in hands-on projects, collaborative research, and industry
                                    internships
                                    to gain real-world experience. The curriculum covers essential topics including
                                    algorithms,
                                    data structures, computer architecture, software engineering, artificial intelligence,
                                    and
                                    cybersecurity.
                                </p>
                            </div>

                            <div class="section">
                                <h3 class="section-title"><i class="fas fa-list-check"></i> Key Features</h3>
                                <div class="features-grid">
                                    <div class="feature-card">
                                        <div class="feature-icon">
                                            <i class="fas fa-laptop-code"></i>
                                        </div>
                                        <div>
                                            <h4>Industry-Relevant Curriculum</h4>
                                            <p>Updated courses aligned with tech industry needs</p>
                                        </div>
                                    </div>
                                    <div class="feature-card">
                                        <div class="feature-icon">
                                            <i class="fas fa-briefcase"></i>
                                        </div>
                                        <div>
                                            <h4>Internship Program</h4>
                                            <p>Guaranteed internship with tech companies</p>
                                        </div>
                                    </div>
                                    <div class="feature-card">
                                        <div class="feature-icon">
                                            <i class="fas fa-user-graduate"></i>
                                        </div>
                                        <div>
                                            <h4>Expert Faculty</h4>
                                            <p>Learn from industry experts and researchers</p>
                                        </div>
                                    </div>
                                    <div class="feature-card">
                                        <div class="feature-icon">
                                            <i class="fas fa-network-wired"></i>
                                        </div>
                                        <div>
                                            <h4>Industry Partnerships</h4>
                                            <p>Collaborations with leading tech companies</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section">
                                <h3 class="section-title"><i class="fas fa-book"></i> Curriculum Structure</h3>
                                <p class="description">
                                    The program consists of 120 credit hours distributed over 8 semesters. The curriculum
                                    includes core computer science courses, technical electives, mathematics and science
                                    requirements, and general education courses.
                                </p>
                                <div class="features-grid">
                                    <div class="feature-card">
                                        <div class="feature-icon">
                                            <i class="fas fa-cogs"></i>
                                        </div>
                                        <div>
                                            <h4>Core Courses</h4>
                                            <p>{{ $course->course_name }}</p>
                                        </div>
                                    </div>
                                    <div class="feature-card">
                                        <div class="feature-icon">
                                            <i class="fas fa-robot"></i>
                                        </div>
                                        <div>
                                            <h4>Specializations</h4>
                                            <p>AI, Cybersecurity, Data Science, Software Eng</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="course-sidebar">
                            <div class="university-info">
                                <div class="university-header">
                                    <div class="university-logo">
                                        <i class="fas fa-university"></i>
                                    </div>
                                    <div>
                                        <h3>{{ $university->university_name }} University</h3>
                                        <p>Established 1950</p>
                                    </div>
                                </div>
                                <p>Ranked among the top 100 universities globally for computer science education and
                                    research.
                                </p>
                                <div class="meta-item" style="margin-top: 15px;">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>San Francisco, California</span>
                                </div>
                            </div>
                            <div class="stats-card">
                                <h3 class="section-title"><i class="fas fa-chart-line"></i> Program Statistics</h3>
                                <div class="stat-item">
                                    <span>Program Duration</span>
                                    <strong>4 Years</strong>
                                </div>
                                <div class="stat-item">
                                    <span>Credit Hours</span>
                                    <strong>120 Credits</strong>
                                </div>
                                <div class="stat-item">
                                    <span>Class Size</span>
                                    <strong>25 Students</strong>
                                </div>
                                <div class="stat-item">
                                    <span>Graduation Rate</span>
                                    <strong>92%</strong>
                                </div>
                                <div class="stat-item">
                                    <span>Employment Rate</span>
                                    <strong>96% within 6 months</strong>
                                </div>
                            </div>
                            @if ($course_books->count())
                                <div class="stats-card">
                                    <h3 class="section-title"><i class="fas fa-chart-line"></i>Course Books
                                        <div class="stat-item">
                                            <a href="{{ route('show.courses.books.form', $course->id) }}"
                                                class="btn btn-outline-warning btn-sm">
                                                Add Book
                                            </a>
                                        </div>

                                    </h3>
                                    @foreach ($course_books as $book)
                                        <a href="{{ route('book.detail.view', $book->id) }}" class="stat-item">
                                            <span>Book Name </span>
                                            <strong>{{ $book->book_name }}</strong>
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-warning mt-3" role="alert">
                                    No books found for this course.
                                </div>
                            @endif
                        </div>
                    </div>

                </div>

                <footer>
                    <p>© 2023 University Course Management System | Designed with <i class="fas fa-heart"
                            style="color: var(--accent);"></i> for Education</p>
                </footer>
            </div>
        </body>

        </html>


    @endsection
