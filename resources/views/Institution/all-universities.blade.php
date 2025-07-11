<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>{{ $pageTitle }}</title>
</head>
@extends('layouts.app')

@section('title', $pageTitle ?? 'Default Page Title')


<body>
    @section('all-university')
        <h1></h1>
        {{-- More content --}}

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm border-0">
                        <div class="card shadow">
                            <div
                                class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="bi bi-building"></i> All University Names
                                </h4>
                                <a href="{{ route('university.store') }}" class="btn btn-light text-primary fw-bold">
                                    <i class="bi bi-plus-circle"></i> Add University
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($universities->count())
                                <div class="list-group">
                                    @foreach ($universities as $university)
                                        <div
                                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <span class="fw-semibold">
                                                {{ $university->university_name }}
                                            </span>
                                            <div class="d-flex gap-2">
                                                <div>
                                                    <a href="{{ route('university.courses', $university->id) }}"
                                                        class="btn btn-outline-primary">
                                                        View Courses
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="{{ route('show.courses', $university->id) }}"
                                                        class="btn btn-outline-primary">
                                                        ➕ Add Courses
                                                    </a>
                                                </div>
                                                <form action="{{ route('university.store.destroy', $university->id) }}"
                                                    method="POST" class="flex-fill">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger w-100" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-warning text-center mb-0">
                                    No universities found.
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
