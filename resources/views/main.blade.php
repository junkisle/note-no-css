<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @if(session()->has('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    @php


    @endphp
    <h1>Welcome {{ $Account->username }}</h1>

    <a href="{{ route('tasks.open', ['username' => $Account->username]) }}" class="btn btn-primary">Tasks</a>

    <a href="{{ route('signup.open') }}"><button>Notes</button></a>
</body>
</html>