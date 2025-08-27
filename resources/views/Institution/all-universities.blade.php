@extends('layouts.app')
@section('title', 'All Universities')
@section('all-university')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{asset('css/aii-uni-name.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    </head>
    <style>
       
    </style>

    <body>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <div class="d-flex justify-content-between align-items-center header-content">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-building me-3" style="font-size: 1.8rem;"></i>
                                    <h2 class="mb-0">University Management</h2>
                                </div>
                                <div class="d-flex gap-3">
                                    <div class="search-container">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search universities...">
                                            <button class="btn btn-light" type="button">
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <a href="{{ route('university.store') }}"
                                        class="btn btn-light text-primary fw-bold d-flex align-items-center">
                                        <i class="bi bi-plus-circle me-2"></i> Add University
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <!-- Statistics Bar -->
                            <div class="d-flex flex-wrap justify-content-around mb-4 p-3 bg-light rounded">
                                <div class="text-center px-3">
                                    <h4 class="text-primary">{{ $uni_count }}</h4>
                                    <p class="mb-0 text-muted">Total Universities</p>
                                </div>
                                <div class="text-center px-3">
                                    <h4 class="text-success">{{ $uni_courses }}</h4>
                                    <p class="mb-0 text-muted">Total Courses</p>
                                </div>
                                <div class="text-center px-3">
                                    <h4 class="text-secondary">42</h4>
                                    <p class="mb-0 text-muted">Active Editors</p>
                                </div>
                            </div>

                            <!-- University List -->
                            <div class="list-group">
                                @if ($universities->count())
                                    @foreach ($universities as $university)
                                        <div class="list-group-item university-item p-3">
                                            <div
                                                class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                                                <div class="mb-2 mb-md-0">
                                                    <span class="university-name d-block mb-1">{{ $university->university_name }}</span>
                                                    <span class="badge bg-success">{{ $course_count->get($university->id, 0) }}courses</span>
                                                    <span class="badge bg-info ms-1">California, USA</span>
                                                </div>
                                                <div class="action-group">
                                                    <a href="{{ route('university.courses', $university->id) }}"
                                                        class="btn btn-outline-primary btn-action">
                                                        <i class="bi bi-eye"></i> View
                                                    </a>
                                                    <a href="{{ route('show.courses', $university->id) }}"
                                                        class="btn btn-success btn-action">
                                                        <i class="bi bi-plus-circle"></i> Add Courses
                                                    </a>
                                                    <a href="{{ route('uni.name.update.form', $university->id) }}"
                                                        class="btn btn-outline-secondary btn-action">
                                                        <i class="bi bi-pencil"></i> Edit University
                                                    </a>
                                                    <form action="{{ route('university.store.destroy', $university->id) }}"
                                                        method="POST" class="flex-fill">@csrf
                                                        @method('DELETE')
                                                        <button class="btn bi bi-trash btn-danger btn-action"
                                                            type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-warning text-center mb-0">
                                        No universities found.
                                    </div>
                                @endif
                            </div>
                            <!-- University Item 2 -->


                            <!-- Pagination -->
                            <nav class="mt-4">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>

                            <!-- Card Footer -->
                            <div class="card-footer bg-light d-flex justify-content-between align-items-center">
                                <span class="text-muted">Showing 4 of 24 universities</span>
                                <div>
                                    <span class="text-muted me-2">Items per page:</span>
                                    <select class="form-select form-select-sm d-inline-block w-auto">
                                        <option>10</option>
                                        <option selected>25</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </html>
@endsection
