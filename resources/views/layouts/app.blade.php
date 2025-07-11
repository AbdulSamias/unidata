<!DOCTYPE html>
<html>

<head>
    <title>@yield('title', config('app.name', 'My App'))</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>


    {{-- Include navbar --}}
    <div>
        @include('layouts.navbar')
    </div>
    <div class="container mt-4">
        @yield('all-university')
    </div>
    <div class="container mt-4">
        @yield('email')
    </div>
    <div class="container mt-4">
        @yield('add-uni-data')
    </div>
    <div class="container mt-4">
        @yield('course-detail')
    </div>
    <div class="container mt-4">
        @yield('uni-courses-form')
    </div>
    <div class="container mt-4">
        @yield('course-books-form')
    </div>
    <div class="container mt-4">
        @yield('uni-courses')
    </div>
    <div class="container mt-4">
        @yield('add-uni-form')
    </div>
    <div class="container mt-4">
        @yield('update-card')
    </div>
    <div class="container mt-4">
        @yield('add-book-detail')
    </div>
    <div class="container mt-4">
        @yield('course-detail-view')
    </div>
</body>

</html>
