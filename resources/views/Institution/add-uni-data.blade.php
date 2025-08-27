<!-- resources/views/your_form.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Details Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
@extends('layouts.app')

<body class="bg-light">
    @section('add-uni-data')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="card-header bg-primary text-white text-center">
                                <h4 class="mb-0">University Details</h4>
                            </div>
                            <!-- Laravel Form -->
                            <form action="{{ route('uni.store') }}" method="POST">
                                @csrf

                                <!-- User ID -->
                                @if (Auth::check())
                                    <div class="mb-3">
                                        <label class="form-label">User Email: {{ Auth::user()->email }}</label>
                                    </div>
                                @else
                                    <div class="alert alert-warning">No user is logged in.</div>
                                @endif
                                <!-- University -->
                                <div class="mb-3">
                                    <label for="uni_name" class="form-label">University</label>
                                    <input type="text" value="{{ old('uni_name') }}" name="uni_name" id="uni_name" class="form-control" required>
                                    @error('uni_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Course -->
                                <div class="mb-3">
                                    <label for="course" class="form-label">Course</label>
                                    <input type="text" value="{{ old('course') }}" name="course" id="course" class="form-control" required>
                                </div>
                                @error('course')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <!-- Semester -->
                                <div class="mb-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <input type="number" name="semester" id="semester" value="{{ old('semester') }}" class="form-control" required>
                                    @error('semester')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Books -->
                                <div class="mb-3">
                                    <label for="books" class="form-label">Books</label>
                                    <input type="text" name="books" id="books" class="form-control" value="{{ old('books') }}"
                                        placeholder="List of books...">
                                    @error('books')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="">
                                    <button type=" submit" class="m-2 btn btn-primary ">Submit</button>
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
