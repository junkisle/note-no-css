<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit task</h1>
    <a href="{{ route('tasks.open', ['username' => $task->username]) }}">Back to tasks</a>

    <h2>{{ $task->username }}</h2>

    <form action="{{ route('tasks.edit', ['task' => $task->id]) }}" method="post">
        @csrf
        @method('put')
        <div>
            <input type="text" name="username" value="{{ $task->username }}" readonly/>
        </div>
        <div>
            <input type="text" name="title" value="{{ $task->title }}"/>
        </div>
        <div>
            <input type="text" name="description" value="{{ $task->description }}"/>
        </div>
        <div>
            <input type="text" name="status" value="pending" readonly/>
        </div>
        <button type="submit">submit</button>
    </form>
</body>
</html>