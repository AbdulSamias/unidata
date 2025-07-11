<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Book Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')
    @section('course-detail-view')
        <div class="container mt-5">
            <div class="card mb-3 shadow">
                <div class="row g-0">
                    @if ($book_detail)
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $book_detail->cover_image) }}" alt="Book Cover" class="img-fluid">
                        </div>

                        <!-- Book Details -->
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h3 class="card-title">
                                        <h4>Book Title :</h4> {{ $book_detail->title }}
                                    </h3>
                                </div>
                                <div>
                                    <h5 class="card-subtitle mb-2 text-muted">
                                        <h4>By Author Name :</h4> {{ $book_detail->author }}
                                    </h5>
                                </div>
                                <div>
                                    <p class="card-text mt-3">
                                    <h4>Description :</h4>{{ $book_detail->description }}
                                    </p>
                                </div>
                                <div>
                                    <p class="card-text">
                                        <small class="text-muted">Published: 2025</small>
                                    </p>
                                </div>
                                <a href="#" class="btn btn-primary mt-2">Read More</a>
                            </div>
                        </div>
                    @else
                        <p class="text-danger">Book detail not found.</p>
                    @endif
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
