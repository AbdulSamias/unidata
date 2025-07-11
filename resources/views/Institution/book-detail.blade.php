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

    @section('title', 'Add New Book')

    @section('add-book-detail')

        <div class="container mt-5">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Add Book Detail</h4>
                        </div>
                        <div class="card-body">
                            @error('warning')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <form action="{{ route('add.book.detail.submit') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="book_id" class="form-label">Book Name:{{ $book->book_name }} </label>
                                    <input type="hidden" name="book_id" id="book_id" value="{{ $book->id }}"
                                        class="form-control" value="{{ old('title') }}" required>
                                    @error('book_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="title" class="form-label">Title:</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title') }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="author" class="form-label">Author:</label>
                                    <input type="text" name="author" id="author" class="form-control"
                                        value="{{ old('author') }}" required>
                                    @error('author')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <textarea name="description" id="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="cover_image" class="form-label">Cover Image:</label>
                                    <input type="file" name="cover_image" id="cover_image" class="form-control">
                                    <img id="preview" src="#" alt="Image Preview"
                                        style="display: none; max-width: 200px; margin-top: 10px;" />
                                    @error('cover_image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Save Book</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>


    @endsection
</body>

</html>
