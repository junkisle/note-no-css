<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intern Tracking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>

    
    
    <div class="container">
        @if(session()->has('success'))
            <div id="success-message">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(function () {
                    const message = document.getElementById('success-message');
                    if (message) {
                        message.style.display = 'none';
                    }
                }, 3000); // 3000ms = 3 seconds
            </script>
        @endif
        <div class="row mt-5">
            <div class="d-flex justify-content-center">
                <h1>Intern Tracking System</h1>
            </div>
            <div class="d-flex justify-content-center">
                <h3>Get Started</h3>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
                <div>
                    <a href="{{ route('login.open') }}" class="btn btn-primary m-1">Login</a>
                </div>
                <div>
                    <a href="{{ route('signup.open') }}" class="btn btn-primary m-1">Register</a>
                </div>
                
                
            </div>
        </div>
            
    </div>
    
    
</body>
</html>