<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('notes.edit', ['note' => $note->id]) }}" method="post">
        @csrf
        @method('put')
        <div>
            <input type="text" name="username" value="{{ $note->username }}" readonly/>
        </div>
        <div>
            <input type="text" name="title" value="{{ $note->title }}"/>
        </div>
        <div>
            <input type="text" name="description" value="{{ $note->description }}"/>
        </div>
        <div>
            <textarea style="width: 300px; height:100px; padding:2px;" type="text" name="content">{{ $note->content }}</textarea>
        </div>
        <input type="submit" value="submit">
    </form>
</body>
</html>