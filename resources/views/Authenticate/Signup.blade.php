<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Signup</title>
</head>
<body>
        
    <div class="container bg-light">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex justify-content-center align-items-center my-5 flex-column border border-dark rounded-3 bg-white p-5">

                @if(session()->has('success'))
                    <div class="alert alert-success py-1 px-5 mb-2 auto-dismiss">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger py-1 px-5 mb-2 auto-dismiss">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <script>
                    // Hide all alerts with the auto-dismiss class after 3 seconds
                    setTimeout(function () {
                        document.querySelectorAll('.auto-dismiss').forEach(function (el) {
                            el.style.display = 'none';
                        });
                    }, 3000);
                </script>

                <div class="align-self-start">
                    <a href="{{ '/' }}" class="px-2 text-light bg-dark rounded text-decoration-none">Homepage</a>
                </div>
                
                    <h1>Signup</h1>
                        <form action="{{ route('signup.account') }}" method="post" class="w-100">
                            @csrf
                            @method('post')
                            <div class="my-2">
                                <input class="form-control border border-dark" type="text" name="username" placeholder="username"/>
                            </div>
                            <div>
                                <input class="form-control border border-dark" type="password" name="password" placeholder="password"/>
                            </div>
                            <div class="d-flex justify-content-end">
                                <input class="btn btn-primary mt-3" type="submit" value="submit"/>
                            </div>
                        </form>
                <h4 class="mt-3">
                    Already have an account?
                </h4>
                <a href="{{ route('login.open') }}" class="btn btn-primary">
                    Log in here
                </a>
            </div>
        </div>
    </div>
</body>
</html>