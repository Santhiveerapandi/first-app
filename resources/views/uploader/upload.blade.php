<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compitable" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Upload Excel File</title>
    <link href="{{ asset('theme/bootstrap.min.css') }}" rel="stylesheet">
    <!-- https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css -->

</head>
<body>
        
        @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if($message = Session::get('errors'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
            @foreach($errors->all() as $error) 
                <li>{{$error}}</li>
            @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <main>
        <form action="{{ route('uploadexcel') }}" enctype="multipart/form-data" method="post">
            @csrf

            <input type="file" class="form-control" name="excelfile" id="excelfile" />
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </form>
        </main>
    </div>
    <script src="{{ asset('theme/bootstrap.min.js') }}"></script>
<!-- Scripts https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js-->
    <script src="{{ asset('theme/jquery.min.js') }}"></script>
    <script>
    $(".btn-primary").click(function() {
        alert("Thanks");
    });
    </script>
</body>
</html>