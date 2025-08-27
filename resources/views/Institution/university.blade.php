@extends('layouts.app')
@section('title', 'University Form')
@section('add-uni-form')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/university-form.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
            integrity="sha512-dYwUHU2ztUk+... (shortened for readability) ..." crossorigin="anonymous"
            referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="form-card">
                <div class="form-header">
                    <h2>University Form</h2>
                </div>

                <div class="form-body">
                    <div class="university-logo">
                        <i class="fas fa-university"></i>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('submit.university.store') }}" method="POST" id="universityForm">
                        @csrf
                        <div class="">
                            <label for="university_name">University Name</label>
                            <div class="input-field">
                                <i class="fas fa-school"></i>
                                <input type="text" id="university_name" name="university_name" value="{{ old('university_name') }}"
                                    placeholder="Enter university name" required>
                            </div>
                            @error('university_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="submit-btn">Submit University Details</button>
                    </form>
                </div>

                <div class="form-footer">
                    <p>© 2023 Academic Records System. All rights reserved.</p>
                </div>
            </div>
        </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </html>
@endsection
