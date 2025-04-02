<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(session()->has('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Signup</h1>
    <form action="{{ route('signup.account') }}" method="post">
        @csrf
        @method('post')
        <div>
            <input type="text" name="username" placeholder="type username"/>
        </div>
        <div>
            <input type="text" name="password" placeholder="type password"/>
        </div>
        <input type="submit" value="submit">
    </form>

    <h4>Have an account?</h4>
    <a href="{{ route('login.open') }}"><p>Log in here</p></a>
</body>
</html>