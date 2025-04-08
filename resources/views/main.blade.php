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
    <div class="container">
        <div class="row justify-content-center pt-5 h-50">
            <div class="col-6 d-flex justify-content-center align-items-center my-5 flex-column border border-dark rounded-3 bg-white p-5 ">
                <h1>Welcome, {{ $Account->username }}.</h1>
                <h3>Choose.</h3>
                <div class="pb-4">
                    <a href="{{ route('tasks.open', ['username' => $Account->username]) }}" class="btn btn-primary">Tasks</a>

                    <a href="{{ route('notes.open', ['username' => $Account->username]) }}" class="btn btn-primary">Notes</a>
                </div>
                
            </div>
        </div>
    </div>
    
</body>
</html>