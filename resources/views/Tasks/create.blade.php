<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add task</h1>

    <h2>{{ $user_data->username }}</h2>

    <form action="{{ route('tasks.submit', ['username' => $user_data->username]) }}" method="post">
        @csrf
        @method('post')
        <div>
            <input type="text" name="username" value="{{ $user_data->username }}" readonly/>
        </div>
        <div>
            <input type="text" name="title" placeholder="Name your title"/>
        </div>
        <div>
            <input type="text" name="description" placeholder="Description"/>
        </div>
        <div>
            <input type="text" name="status" value="pending" readonly/>
        </div>
        <button type="submit">submit</button>
    </form>
</body>
</html>