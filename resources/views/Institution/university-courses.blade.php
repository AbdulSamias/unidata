<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Universitie Courses</title>
    <style>
        .university-btn {
            background-color: #007BFF;
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
            padding: 12px 20px;
            text-align: center;
            transition: 0.3s ease;
        }

        .university-btn:hover {
            background-color: #0056b3;
            color: #fff;
            text-decoration: none;
        }
    </style>

</head>

<body>
    @extends('layouts.app')
    @section('uni-courses')
        <h1>University : {{ $university->university_name }} </h1>
        @foreach ($uni_courses as $course)
            <div class="row">
                <div class="col-md-4 ">
                    <a href="{{ route('course.detail', $course->id) }}"
                        class="btn btn-outline-primary university-btn btn-lg mb-3 w-100 text-uppercase shadow-sm">
                        {{ $course->course_name }}
                    </a>
                </div>
                <div>
                    <a href="{{ route('show.courses.books.form', $course->id) }}" class="btn btn-outline-primary">
                        ➕ Add Books
                    </a>
                </div>
            </div>
        @endforeach
    @endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
