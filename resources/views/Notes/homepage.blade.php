<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5 py-3 bg-warning border border-secondary rounded-2">
        <header class="header border-bottom border-dark mb-4">
            <h1>Welcome to notes, {{ $Account->username }}</h1>
            <a class="border border-success text-decoration-none bg-success text-light px-3 py-1 m-2" href="{{ route('main.open' , ['username' => $Account->username]) }}">Back</a>
        </header>
            <div class="row">
                <div class="col-sm-12 col-md-2">
                    <div class="section border border-dark px-2" style="height: 600px; width: 200px; ">
                        @if ($Notes->isEmpty())
                            <button class="btn btn-info">
                                <a href="{{ route('notes.create', ['username' => $Account->username]) }}">Start your journey with us!</a>
                            </button>
                        @else
                            @foreach ($Notes as $index => $Note)
                                <button class="btn btn-primary m-1" onclick="showNote({{ $index }})">{{ $Note->created_at }}</button><br>
                            @endforeach
                        @endif
                    </div>
                </div>
                
                <div class="col-md-10 col-sm-12">
                    <div>
                        <h1>Notes</h1>
                        @if ($Notes->isEmpty())
                            <h1>Start your journey with us!</h1>
                        @else
                        @foreach ($Notes as $index => $Note)
                                <div id="note-{{ $index }}" class="note-content bg-light px-5 py-3 mx-4" style="display: none; height:540px; overflow-y:auto">
                                    <div class="d-flex align-items-center gap-2">
                                        <form action="{{ route('notes.delete', ['note' => $Note->id]) }}" method="post" class="mb-0">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editNoteModal{{ $Note->id }}">
                                            Edit
                                        </button>
                                    </div>
                            
                                    <h1>{{ $Note->title }}</h1>
                                    <h6>{{ $Note->description }}</h6>

                                    <div class="mh-100 d-inline-block" style="overflow-y:scroll; width: 100%; height: 400px;">
                                        <p>{{ $Note->content }}</p>
                                    </div>

                                </div>
                            
                                <!-- Modal should be here, inside the loop -->
                                <div class="modal fade" id="editNoteModal{{ $Note->id }}" tabindex="-1" aria-labelledby="editNoteModalLabel{{ $Note->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editNoteModalLabel{{ $Note->id }}">Edit Note</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('notes.edit', ['note' => $Note->id]) }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="username" value="{{ $Note->username }}" />
                            
                                                    <div class="mb-3">
                                                        <label for="noteTitle{{ $Note->id }}" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="noteTitle{{ $Note->id }}" name="title" value="{{ $Note->title }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="noteDescription{{ $Note->id }}" class="form-label">Description</label>
                                                        <input type="text" class="form-control" id="noteDescription{{ $Note->id }}" name="description" value="{{ $Note->description }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="noteContent{{ $Note->id }}" class="form-label">Content</label>
                                                        <textarea class="form-control" id="noteContent{{ $Note->id }}" name="content" required>{{ $Note->content }}</textarea>
                                                    </div>
                            
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    
                    </div>
                </div>
            </div>
            
            <button class="btn btn-success btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#addNoteModal{{ $Account->id }}">
                Add a Note
            </button>

            <div class="modal fade" id="addNoteModal{{ $Account->id }}" tabindex="-1" aria-labelledby="addNoteModalLabel{{ $Account->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNoteModalLabel{{ $Account->id }}">Add Note</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('notes.submit', ['username' => $Account->username]) }}" method="POST">
                                @csrf
                                @method('post')
                                <input type="hidden" name="username" value="{{ $Account->username }}" />
        
                                <div class="mb-3">
                                    <label for="noteTitle{{ $Account->id }}" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="noteTitle{{ $Account->id }}" name="title" required/>
                                </div>
                                <div class="mb-3">
                                    <label for="noteDescription{{ $Account->id }}" class="form-label">Description</label>
                                    <input type="text" class="form-control" id="noteDescription{{ $Account->id }}" name="description" required/>
                                </div>
                                <div class="mb-3">
                                    <label for="noteContent{{ $Account->id }}" class="form-label">Content</label>
                                    <textarea class="form-control" id="noteContent{{ $Account->id }}" name="content" required></textarea>
                                </div>
                                <div>
                                    <input type="submit" value="submit"     class="btn btn-primary"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div name="end container">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>