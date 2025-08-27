@extends('layouts.app')
@section('title', 'Roles Form')
@section('roles_form')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/roles-form.css') }}">
    </head>

    <body>
        <header>
            <div class="container">
                <h1>Add New University Role</h1>
                <p>Administrator Portal</p>
            </div>
        </header>
        <form action="{{ route('role.form.submit') }}" method="post" class="container">
            <div class="form-container">
                <form id="roleForm">
                    <div class="form-group">
                        <label for="role_title">Role Title*</label>
                        <input type="text" id="role_title" name="role_title" value="{{ old('role_title') }}" required
                            placeholder="e.g., Assistant Professor">
                    </div>
                    <div class="form-group">
                        <label for="role_desc">Description</label>
                        <input type="text" id="role_desc" name="role_desc" required value="{{ old('role_desc') }}"
                            placeholder="e.g., Assistant Professor">
                    </div>
                    <button type="submit">Submit Role</button>
                </form>
            </div>
        </form>

        <footer>
            <div class="container">
                <p>&copy; 2023 University Administration System</p>
            </div>
        </footer>


    </body>

    </html>
@endsection
