<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

@extends('layouts.app')
@section('title', 'Send Email')
</head>

<body class="bg-light">
@section('email')
    <div class="container mt-5">
        {{-- Email Form --}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Send Email</h4>
                    </div>
                    <div class="card-body">
                        <form action="/send-email" method="POST">
                            @csrf
                            {{-- To --}}
                            <div class="mb-3">
                                <label for="to" class="form-label">Recipient Email</label>
                                <input type="email" name="to" class="form-control"
                                    placeholder="Enter recipient email" required autofocus>
                                @error('to')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Subject --}}
                            <div class="mb-3">
                                <label for="sub" class="form-label">Subject</label>
                                <input type="text" name="sub" class="form-control" placeholder="Enter subject"
                                    required>
                                @error('sub')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Message --}}
                            <div class="mb-3">
                                <label for="msg" class="form-label">Message</label>
                                <textarea name="msg" class="form-control" rows="4" placeholder="Enter message" required></textarea>
                                @error('msg')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Send Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Utility Buttons --}}
        <div class="row justify-content-center mt-4">
            <div class="col-md-8 d-flex justify-content-between">

                {{-- Change Password --}}
                <form action="{{ route('change_password.show_form') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Change Password</button>
                </form>

                {{-- Logout --}}
                <form action="{{ route('logout') }}" method="GET">
                    @csrf
                    <button class="btn btn-outline-danger">Logout</button>
                </form>
                <div class="d-grid">
                    <button class="btn btn-warning text-white"><a class="dropdown-item" href="/university-details">Add
                            University Data</a></button>
                </div>
                <div class="d-grid">
                    <button class="btn btn-warning text-white"><a class="dropdown-item" href="/update-detail-card">All
                            Detail</a></button>
                </div>
            </div>
        </div>

    </div>
@endsection

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
