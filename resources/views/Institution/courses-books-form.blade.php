<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    @extends('layouts.app')
    @section('course-books-form')
        <div class="container mt-5">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4>Select University, Course & Enter Book</h4>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add Course Book</h5>
                    </div>
                    <div class="card-body">
                        @error('success')
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @enderror
                        <form action="{{ route('submit.courses.books.form.store') }}" method="POST">
                            @csrf
                            {{-- University Select --}}
                            <div class="mb-3">
                                <label for="university_id" class="form-label">University Name :
                                    {{ $university->university_name }}</label>
                            </div>

                            {{-- Course Select --}}
                            <div class="mb-3">
                                <label class="form-label">Course Name: {{ $course->course_name }}</label>
                                {{-- Hidden input for course_id --}}
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                            </div>

                            {{-- Book Name --}}
                            <div class="mb-3">
                                <label for="book_name" class="form-label">Book Name</label>
                                <input type="text" class="form-control" name="book_name" id="book_name"
                                    placeholder="Enter Book Name" required>
                                @error('book_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Book Price --}}
                            <div class="mb-3">
                                <label for="book_price" class="form-label">Book Price (Rs.)</label>
                                <input type="number" class="form-control" name="book_price" id="book_price"
                                    placeholder="Enter Book Price" min="0" required>
                                @error('book_price')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Book Stock --}}
                            <div class="mb-3">
                                <label for="book_stock" class="form-label">Book Stocks</label>
                                <input type="number" class="form-control" name="book_stock" id="book_stock"
                                    placeholder="Enter Book Stock" min="0" required>
                                @error('book_stock')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Buttons --}}
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
