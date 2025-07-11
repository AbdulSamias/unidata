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
    @section('course-detail')
        <div class="container mt-4">
            <!-- Header Card -->
            <div class="card shadow mb-4 border-0">
                <div class="card-header bg-primary text-white py-3">
                    <div
                        class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 flex-wrap">
                        <h4 class="mb-0 fw-bold">
                            🎓 University: {{ $university->university_name }}
                        </h4>
                        <h5 class="mb-0">
                            📘 Course: <span class="fw-light">{{ $course->course_name }}</span>
                        </h5>
                        <a href="{{ route('show.courses.books.form', $course->id) }}"
                            class="btn btn-light btn-sm text-primary fw-semibold">
                            ➕ Add New Book
                        </a>
                    </div>
                </div>

                <div class="card-body bg-light">
                    <h5 class="text-primary mb-3 fw-bold">📚 Book List</h5>

                    @if ($course_books->count())
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            @foreach ($course_books as $book)
                                <div class="col">
                                    <div class="card h-100 shadow-sm border-0">
                                        <div class="card-body">
                                            <h5 class="card-title text-dark">{{ $book->book_name }}</h5>
                                            <p class="card-text text-muted mb-2">
                                                <strong>Price:</strong> Rs. {{ number_format($book->book_price, 2) }}<br>
                                                <strong>Stock:</strong> {{ $book->book_stock }}
                                                <strong>sale:</strong> {{ $book->book_sale }}
                                                <strong>Available Book:</strong> {{ $book->available_book }}
                                            </p>
                                        </div>
                                        <div
                                            class="card-footer bg-white border-top-0 d-flex justify-content-between px-3 pb-3">
                                            <a href="{{ route('add.book.detail', $book->id) }}"
                                                class="btn btn-outline-success btn-sm">
                                                ✍️ Add Details
                                            </a>
                                            <a href="{{ route('book.detail.view', $book->id) }}"
                                                class="btn btn-outline-primary btn-sm">
                                                🔍 View Book
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-warning mt-3" role="alert">
                            No books found for this course.
                        </div>
                    @endif
                </div>
            </div>

            <!-- Add Book Button -->

        </div>

    @endsection
</body>

</html>
