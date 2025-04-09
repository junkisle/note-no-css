<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tasks</title>

    <style>
        .parent {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(1, 1fr);
            gap: 8px;
        }

    </style>

</head>
<body>
    
    
    
    <div class="container"> 
                @if (session()->has('success'))
                    <div class="mt-5 d-flex text-align-center justify-content-center alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
        <div class="mt-5">
                       
                    <h1 class="mt-5">Tasks</h1>
                    <h2 class="p-3">{{ $Account->username }}, welcome to tasks</h2>
                    <a class="border border-success text-decoration-none bg-success text-light px-3 py-1 m-2" href="{{ route('main.open' , ['username' => $Account->username]) }}">Back</a>
                
                    <div class="parent m-2" style="height: 50vh;">
                
                        @foreach(['pending', 'doing', 'done'] as $status)
                            <div class="col-xs-12 border border-dark p-3 text-break text-wrap overflow-y-auto">
                                <h1>{{ ucfirst($status) }}</h1>
                
                                @foreach($Tasks as $Task)
                                @if ($Task->status === $status)

                                    <div class="d-flex align-items-center my-2 mt-2 mx-5 py-1 text-wrap">
                                        <div class="dropdown mx-2">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{-- Button content (empty) --}}
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                {{-- Status Change --}}
                                                <li>
                                                    <form action="{{ route('tasks.update', ['task' => $Task->id]) }}" method="POST" class="dropdown-item p-0">
                                                        @csrf
                                                        @method('put')
                                                        <select name="status" class="form-select border-0" onchange="this.form.submit()">
                                                            <option disabled selected>Change status</option>
                                                            @if ($status === 'pending')
                                                                <option value="doing">Doing</option>
                                                                <option value="done">Done</option>
                                                            @elseif ($status === 'doing')
                                                                <option value="pending">Pending</option>
                                                                <option value="done">Done</option>
                                                            @else
                                                                <option value="pending">Pending</option>
                                                                <option value="doing">Doing</option>
                                                            @endif
                                                        </select>
                                                    </form>
                                                </li>
                                                {{-- Edit Task Button (Triggers Modal) --}}
                                                <li>
                                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editTaskModal{{ $Task->id }}">
                                                        Edit
                                                    </button>
                                                </li>
                                                {{-- Delete Task --}}
                                                <li>
                                                    <form action="{{ route('tasks.destroy', ['task' => $Task->id]) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="dropdown-item text-danger" type="submit" onclick="return confirm('Are you sure?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        <h5 class="mb-0">{{ $Task->title }}</h5>
                                    </div>

                                    <!-- Modal for Editing Task -->
                                    <div class="modal fade" id="editTaskModal{{ $Task->id }}" tabindex="-1" aria-labelledby="editTaskModalLabel{{ $Task->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editTaskModalLabel{{ $Task->id }}">Edit Task</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('tasks.edit', ['task' => $Task->id]) }}" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <div>
                                                            <input type="hidden" name="username" value="{{ $Task->username }}" readonly/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="taskTitle{{ $Task->id }}" class="form-label">Title</label>
                                                            <input type="text" class="form-control" id="taskTitle{{ $Task->id }}" name="title" value="{{ $Task->title }}" required>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>  
                                    <div class="col-4">
                                        <button class="p-2 d-flex justify-content-center dropdown-item border mt-2 bg-primary text-white" data-bs-toggle="modal" data-bs-target="#addNewTaskModal">
                                            Add a Task
                                        </button>
                                    </div>
                                    

                                    <div class="modal fade" id="addNewTaskModal" tabindex="-1" aria-labelledby="addNewTaskModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewTaskModal">Add a Task</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('tasks.submit', ['username' => $Account->username]) }}" method="POST">
                                                        @csrf
                                                        @method('post')
                                                        <div>
                                                            <input type="hidden" name="username" value="{{ $Account->username }}" readonly/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Title</label>
                                                            <input type="text" class="form-control" id="taskTitle" name="title" value="" required>
                                                        </div>
                                                        <div>
                                                            <input type="hidden" name="status" value="pending" readonly/>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">Add Task</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
            </div>
        </div>
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>