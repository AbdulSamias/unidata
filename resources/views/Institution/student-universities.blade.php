@extends('layouts.app')
@section('title', 'University')
@section('student-universities')

    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/student-university.css') }}">
    </head>
    <div class="container university-select-container">
        <div class="section-heading">
            <h2><i class="fas fa-university me-2"></i>Select Your University</h2>
            <p class="text-muted">Choose your university to proceed with course registration</p>
        </div>

        <div class="row g-4">
            @forelse($universities as $university)
                <div class="col-md-6 col-lg-4">
                    <form method="POST" action="{{ route('student.select.university') }}">
                        @csrf
                        <input type="hidden" name="university_id" value="{{ $university->id }}">
                        <div class="card university-card h-100">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <div class="university-icon">
                                    <i class="fas fa-school"></i>
                                </div>
                                <h3 class="university-name">{{ $university->university_name }}</h3>
                                <div class="university-location">
                                    <i class="fas fa-map-marker-alt me-1"></i>
                                    {{ $university->location ?? 'Location' }}
                                </div>
                                <div class=" d-flex">
                                    <button type="submit" class="btn btn-primary btn-choose mt-3">
                                        <i class="fas fa-check-circle me-1"></i>Choose
                                    </button>
                                    <a href="{{ route('university.courses', $university->id) }}"
                                        class="btn-choose btn btn-choose btn-primary mx-3 mt-3"><i class="text-light px-1 fas fa-eye text-primary"></i>View</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        No universities available to select.
                    </div>
                </div>
            @endforelse
        </div>
    </div>

@endsection
