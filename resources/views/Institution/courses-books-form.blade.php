    @extends('layouts.app')
    @section('title', 'Course Books Form')
    @section('course-books-form')

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="{{ asset('css/course-book-form.css') }}">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        </head>

        <body>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <div class="header-container text-center">
                            <h1 class="mb-3"><i class="bi bi-journal-bookmark me-2"></i>Course Books Management</h1>
                            <p class="lead mb-0">Add required textbooks for university courses</p>
                        </div>

                        <div class="form-container">
                            <div class="card-header">
                                <h3 class="p-4 text-light"><i class="bi bi-plus-circle me-2"></i>Add Course Book</h3>
                            </div>

                            <div class="card-body">
                                <div class="book-icon">
                                    <i class="bi bi-journal-text"></i>
                                </div>

                                <!-- University Section -->
                                <div class="form-section">
                                    <h4 class="section-title"><i class="bi bi-building"></i>University Information</h4>
                                    <div class="info-card">
                                        <p class="info-text"><i class="bi bi-building"></i> University Name: <strong>
                                                {{ $university->university_name }} </strong></p>
                                    </div>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('submit.courses.books.form.store') }}" method="POST">
                                    @csrf
                                    <!-- Course Section -->
                                    <div class="form-section">
                                        <h4 class="section-title"><i class="bi bi-journal"></i>Course Information</h4>
                                        <div class="info-card">
                                            <p class="info-text"><i class="bi bi-journal-text"></i> Course Name: <strong>
                                                    {{ $course->course_name }}</strong></p>
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        </div>
                                    </div>

                                    <!-- Book Details Section -->
                                    <div class="form-section">
                                        <h4 class="section-title"><i class="bi bi-book"></i>Book Details</h4>

                                        <!-- Book Name -->
                                        <div class="mb-4">
                                            <label for="book_name" class="form-label required">
                                                <i class="bi bi-journal-text"></i>Book Name
                                            </label>
                                            <input type="text" name="book_name" value="{{ old('book_name') }}"
                                                class="form-control" id="book_name" placeholder="Enter book title" required>
                                            <div class="text-danger">
                                                @error('book_name')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Price and Stock -->
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <label for="book_price" class="form-label required">
                                                    <i class="bi bi-currency-dollar"></i>Book Price (Rs.)
                                                </label>
                                                <div class="input-group">
                                                    <span class="currency">Rs.</span>
                                                    <input type="number" class="form-control price-input" name="book_price" value="{{ old('book_price') }}"
                                                        id="book_price" placeholder="0.00" min="0" step="0.01"
                                                        required>
                                                </div>
                                                <div class="text-danger">
                                                    @error('book_price')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-4">
                                                <label for="book_stock" class="form-label required">
                                                    <i class="bi bi-box-seam"></i>Book Stock
                                                </label>
                                                <input type="number" class="form-control" name="book_stock" id="book_stock" value="{{ old('book_stock') }}"
                                                    placeholder="Available quantity" min="0" required>
                                                <div class="text-danger">
                                                    @error('book_stock')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="d-flex justify-content-between mt-4">
                                        <a href="#" class="btn btn-secondary">
                                            <i class="bi bi-arrow-left me-2"></i>Back
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-check-circle me-2"></i>Submit Book
                                        </button>
                                    </div>
                                </form>

                                <div class="footer-note mt-4">
                                    <p><i class="bi bi-info-circle me-1"></i> Required fields are marked with an asterisk
                                        (*)
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center text-muted">
                            <p class="small">© 2023 University Book Management System</p>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                // Form validation simulation
                document.addEventListener('DOMContentLoaded', function() {
                    const form = document.querySelector('form');

                    form.addEventListener('submit', function(e) {
                        e.preventDefault();

                        // Get form values
                        const bookName = document.getElementById('bookName').value;
                        const bookPrice = document.getElementById('bookPrice').value;
                        const bookStock = document.getElementById('bookStock').value;

                        // Simple validation
                        if (bookName && bookPrice && bookStock) {
                            // Create success message
                            const successDiv = document.createElement('div');
                            successDiv.className = 'alert alert-success mb-4';
                            successDiv.innerHTML = `
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <div>Success! Your book has been added to the course.</div>
                    `;

                            // Insert after book icon
                            const bookIcon = document.querySelector('.book-icon');
                            bookIcon.parentNode.insertBefore(successDiv, bookIcon.nextSibling);

                            // Scroll to success message
                            successDiv.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });

                            // Reset form after 3 seconds
                            setTimeout(() => {
                                form.reset();
                                successDiv.remove();
                            }, 5000);
                        } else {
                            alert('Please fill in all required fields');
                        }
                    });
                });
            </script>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        </html>
    @endsection
