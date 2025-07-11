<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Institutaions</title>
</head>

<body>
   
    <h1>Semester List</h1>
    <div class="container mt-5">
        <div class="row">
            @foreach ($institutions as $institution)
                <div class="col-md-4 mb-4 d-flex">
                    <div class="card w-150">
                        <img src="https://via.placeholder.com/286x180" class="card-img-top" alt="Card Image">
                        <div class="card-body">
                            <h4 class="card-title">Email: {{ Auth::user()->email }}</h4>
                            <h5 class="card-title">University Name: {{ $institution->uni_name }}</h5>
                            <h5 class="card-title">Course Name: {{ $institution->course }}</h5>
                            <h5 class="card-title">Semester Name: {{ $institution->semester }}</h5>
                            <h5 class="card-title">Books: {{ $institution->books }}</h5>

                            <div class="d-flex flex-wrap justify-content-between mt-3">
                                <a href="/need-update-card" class="btn btn-primary">Update</a>
                                <form action="{{ route('UniversityDetail.destroy', $institution->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                                 <a href="{{ 'back' }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>