    @extends('layouts.app')
    @section('title', 'Course Books')
    @section('course-detail-view')
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>Book Detail</title>
            <link rel="stylesheet" href="{{ asset('css/book-detail-view.css') }}">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        </head>

        <body>
            <div class="container">
                <div class="book-header">
                    <h1>Book Details</h1>
                    <p>Explore comprehensive information about this literary work</p>
                </div>

                <div class="book-card">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <div class="cover-container">
                                <img src="{{ asset('storage/' . $book_detail->cover_image) }}" alt="Book Cover"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="details-container">
                                <h2 class="book-title">{{ $book_detail->title }}</h2>

                                <div class="author-info">
                                    <div class="author-avatar">AM</div>
                                    <div>
                                        <div class="text-muted">Author</div>
                                        <div class="author-name">{{ $book_detail->author }}</div>
                                    </div>
                                </div>

                                <div class="book-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-book-open"></i>
                                        <span>Genre: Mystery</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>Published: 2023</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-file-alt"></i>
                                        <span>Pages: 348</span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-star"></i>
                                        <span>Rating: 4.7/5</span>
                                    </div>
                                </div>

                                <div class="book-description">
                                    <h4 class="description-title"><i class="fas fa-align-left"></i> Description :</h4>
                                    <p class="description-text">
                                       {{ $book_detail->description }}
                                    </p>
                                </div>
                                <a href="{{ route('update.book.detail', $book->id) }}" class="btn btn-primary action-btn">
                                    <i class="fas fa-edit p-1"></i>Update Book Detail</a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="additional-details">
                    <h3 class="mb-4"
                        style="color: var(--primary); font-weight: 700; border-bottom: 3px solid var(--accent); padding-bottom: 10px; display: inline-block;">
                        Book Information</h3>
                    <div class="detail-grid">
                        <div class="detail-card">
                            <div class="detail-icon">
                                <i class="fas fa-language"></i>
                            </div>
                            <div class="detail-title">Language</div>
                            <div class="detail-value">English</div>
                        </div>
                        <div class="detail-card">
                            <div class="detail-icon">
                                <i class="fas fa-bookmark"></i>
                            </div>
                            <div class="detail-title">ISBN</div>
                            <div class="detail-value">978-3-16-148410-0</div>
                        </div>
                        <div class="detail-card">
                            <div class="detail-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="detail-title">Publisher</div>
                            <div class="detail-value">Evergreen Press</div>
                        </div>
                        <div class="detail-card">
                            <div class="detail-icon">
                                <i class="fas fa-tag"></i>
                            </div>
                            <div class="detail-title">Format</div>
                            <div class="detail-value">Hardcover</div>
                        </div>
                    </div>
                </div>

                <footer>
                    <p>© 2023 Book Management System | Designed with <i class="fas fa-heart"
                            style="color: var(--accent);"></i> for Bibliophiles</p>
                </footer>
            </div>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        </html>
    @endsection
