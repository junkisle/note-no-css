<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <div class="header">
            <h1>welcome to notes {{ $Account->username }}</h1>
        </div>
        <h1>date</h1>
        <div class="section" style="height: 200px; width: 100px; overflow-y:auto;">
            @if ($Notes->isEmpty())
                <button>
                    <a href="{{ route('notes.create', ['username' => $Account->username]) }}">Start your journey with us!</a>
                </button>
            @else
                @foreach ($Notes as $index => $Note)
                    <button onclick="showNote({{ $index }})">{{ $Note->created_at }}</button><br>
                @endforeach
            @endif
        </div>
        
        <div>
            <h1>Notes</h1>
            @if ($Notes->isEmpty())
                <h1>Start your journey with us!</h1>
            @else
                @foreach ($Notes as $index => $Note)
                    <div id="note-{{ $index }}" class="note-content" style="display: none;">
                        
                        <a class="button" href="{{ route('notes.editView', ['title' => $Note]) }}" value="{{ $Note->title }}">
                            Edit note {{ $Note->title }}
                        </a> 
                        <form action="{{ route('notes.delete', ['note' => $Note->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete"/>
                        </form>
                            <h1>{{ $Note->title }}</h1>
                            <h2>{{ $Note->description }}</h2>

                            <div>
                                <p>{{ $Note->content }}</p>
                            </div>
                            
                    </div>
                    
                @endforeach
            @endif
            
        </div>

        <div class="section">
            <a href="{{ route('notes.create', ['username' => $Account->username]) }}">add a note</a>
        </div>
    </div>
    <script>
        function showNote(index) {
            const notes = document.querySelectorAll('.note-content');
            notes.forEach(note => note.style.display = 'none'); // Hide all
    
            const selectedNote = document.getElementById(`note-${index}`);
            if (selectedNote) {
                selectedNote.style.display = 'block'; // Show selected
            }
        }
    </script>
</body>
</html>