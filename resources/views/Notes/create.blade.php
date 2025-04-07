<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('notes.submit', ['username' => $Account->username]) }}" method="post">
        @csrf
        @method('post')
        <div>
            <input type="text" name="username" value="{{ $Account->username }}" readonly/>
        </div>
        <div>
            <input type="text" name="title" placeholder="Title of Note"/>
        </div>
        <div>
            <input type="text" name="description" placeholder="Description of Note"/>
        </div>
        <div>
            <textarea style="width: 300px; height:100px; padding:2px;" type="text" name="content" placeholder="Enter note content"></textarea>
        </div>
        <input type="submit" value="submit">
    </form>
</body>
</html>