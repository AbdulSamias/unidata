<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>

    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">UniversityApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto"> <!-- Right aligned -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('university.store')}}">Add
                            Universities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('show.courses')}}">Add
                            Universities Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{route('all.university.names')}}">Universities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('show.mail')}}">Mail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                {{-- Card UI --}}
                <div class="card shadow-lg">
                    <div class="card-header bg-warning text-white text-center">
                        <h4>Change Password</h4>
                    </div>

                    @section('content')
                    <div class="container mt-5">
                        <h3>Change Password</h3>

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="card-body">

                            {{-- Form Start --}}
                            <form action="{{ route('change_password_submit_form') }}" method="POST">
                                @csrf

                                {{-- Old Password --}}
                                <div class="mb-3">
                                    <label for="currentpassword" class="form-label">Current Password</label>
                                    <input type="password" name="currentpassword" class="form-control"
                                        placeholder="******" required>
                                    @error('currentpassword')
                                        <div class="bg-warning">
                                            <small class="text-danger">Incorrect Current Password </small>
                                        </div>
                                    @enderror
                                </div>

                                {{-- New Password --}}
                                <div class="mb-3">
                                    <label for="newpassword" class="form-label">New Password</label>
                                    <input type="password" name="newpassword" class="form-control" placeholder="******"
                                        required>
                                    @error('newpassword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Confirm Password --}}
                                <div class="mb-3">
                                    <label for="newpassword_confirmation" class="form-label">Confirm New
                                        Password</label>
                                    <input type="password" name="newpassword_confirmation" class="form-control"
                                        placeholder="******" required>
                                    @error('newpassword_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>

                                {{-- Submit Button --}}
                                <div>
                                    <div class="d-grid mb-3 ">
                                        <button type="submit" class="btn btn-warning text-white">Change
                                            Password</button>
                                    </div>
                                </div>
                            </form>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-warning text-white"><a class="dropdown-item"
                                        href="/send-email">Back</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bootstrap JS --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>