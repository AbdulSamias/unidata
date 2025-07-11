<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Add Course Names</title>
</head>

<body>
    @extends('layouts.app')
    @section('course-books-form')
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Add University Course</h4>
                    </div>
                    <div class="card-body">

                        {{-- Success message --}}
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        {{-- Laravel Form --}}
                        <form action="{{ route('courses.submit') }}" method="POST">
                            @csrf

                            {{-- University Name --}}
                            <div class="mb-3">
                                <label for="university_id" class="form-label">Course Name: {{ $universities->university_name }}</label>
                                <input type="hidden" name="university_id" value="{{ $universities->id }}">
                            </div>
                            {{-- Course Name --}}
                            <div class="mb-3">
                                <label for="course_name" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="course_name" name="course_name"
                                    placeholder="e.g., BSc Computer Science" required>
                                @error('course_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Course Seats --}}
                            <div class="mb-3">
                                <label for="course_seats" class="form-label">Course Seats</label>
                                <input type="number" class="form-control" id="course_seats" name="course_seats"
                                    placeholder="e.g., 60" required>
                                @error('course_seats')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Submit Button --}}
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Submit Details</button>
                                <a href="{{ 'back' }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
