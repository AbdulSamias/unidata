<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Institutaions</title>
</head>

<body>
    @extends('layouts.app')

    @section('update-card')
        <h1>Update Items</h1>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg border-0 rounded-3">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 class="mb-0">University Details Form</h4>
                        </div>
                        <div class="card-body">
                            {{-- User Email Display --}}
                            @if (Auth::check())
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Logged In Email:</label>
                                    <div class="form-control bg-light">{{ Auth::user()->email }}</div>
                                </div>
                            @endif
                            @error('success')
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @enderror
                            {{-- University Details Form --}}
                            <form action="{{ route('update.submited.card', $update->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="uni_name" class="form-label">University Name</label>
                                    <input type="text" class="form-control" value="{{ $update->uni_name }}"
                                        name="uni_name" id="uni_name" required>
                                    @error('uni_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="course" class="form-label">Course Name</label>
                                    <input type="text" class="form-control" name="course" id="course"
                                        value="{{ $update->course }}" required>
                                    @error('course')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="semester" class="form-label">Semester</label>
                                    <input type="number" class="form-control" name="semester" id="semester"
                                        value="{{ $update->semester }}" required>
                                    @error('semester')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="books" class="form-label">Books</label>
                                    <input type="text" class="form-control" name="books" id="books"
                                        value="{{ $update->books }}" required>
                                    @error('books')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Buttons --}}
                                <div class="d-flex justify-content-between">
                                    <a href="{{ 'back' }}" class="btn btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-success">Submit Details</button>
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
