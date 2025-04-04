<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>

    <p>{{ $Account->username }}, welcome to tasks</p>

    <h1>Tasks</h1>
    <h2>Pending Tasks</h2>
    <div class="container">
        <div class="row">
                <div>
                    <table border="1">
                        <tr>
                            <th>
                                Title
                            </th>
                            <th>
                                Desciption
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>

                        @foreach( $Tasks as $Task)
                            @if ($Task->status === "pending")
                                @if( $Task->username === $Account->username)
                                    <tr>
                                        <td>
                                            {{ $Task->title }}
                                        </td>
                
                                        <td>
                                            {{ $Task->description }}
                                        </td>
                                        <td>                   <!-- indicate task id vvv to be passed to route -->
                                            <form action="{{ route('tasks.update', ['task' => $Task->id]) }}" method="post" >
                                                @csrf
                                                @method('put')
                                                <select name="status" onchange="this.form.submit()">
                                                    <option value="pending">Pending </option>
                                                    <option value="doing">Doing</option>
                                                    <option value="done">Done</option>
                
                                                </select>
                                            </form>
                                            <div>
                                                <button>
                                                    Edit
                                                </button>  
                                            </div>
                                            <div>
                                                <button>
                                                    Delete
                                                </button>  
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </table>
                </div>
                <p></p>
                <h2>Doing</h2>
                <div>
                    <table border="1">
                        <tr>
                            <th>
                                Title
                            </th>
                            <th>
                                Desciption
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>

                        @foreach($Tasks as $Task)
                            @if ($Task->status === "doing")
                                @if( $Task->username === $Account->username)
                                    <tr>
                                        <td>
                                            {{ $Task->title }}
                                        </td>

                                        <td>
                                            {{ $Task->description }}
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <!-- Form to update task status -->
                                                        <form action="{{ route('tasks.update', ['task' => $Task->id]) }}" method="post" class="px-3">
                                                            @csrf
                                                            @method('put')
                                                            <select name="status" class="form-select form-select-sm mt-2 mb-2" onchange="this.form.submit()">
                                                                <option disabled selected>Change status</option>
                                                                <option value="doing">Doing</option>
                                                                <option value="pending">Pending</option>
                                                                <option value="done">Done</option>
                                                            </select>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <!-- Edit Button -->
                                                        <button class="dropdown-item" onclick="window.location.href=''">
                                                            Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <!-- Delete Button inside form -->
                                                        <form action="" method="POST" onsubmit="return confirm('Are you sure?')">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </table>
                </div>
                <p></p>
                <h2>Done</h2>
                <div>
                    <table border="1">   
                        <tr>
                            <th>
                                Title
                            </th>
                            <th>
                                Desciption
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>

                        @foreach( $Tasks as $Task)
                            @if ($Task->status === "done")
                                @if( $Task->username === $Account->username)
                                    <tr>
                                        <td>
                                            {{ $Task->title }}
                                        </td>

                                        <td>
                                            {{ $Task->description }}
                                        </td>
                                        <td>                   <!-- indicate task id vvv to be passed to route -->
                                            <form action="{{ route('tasks.update', ['task' => $Task->id]) }}" method="post" >
                                                @csrf
                                                @method('put')
                                                <select name="status" onchange="this.form.submit()">
           
                                                        <option value="done">Done</option>
                                                        <option value="doing">Doing</option>
                                                        <option value="pending">Pending</option>
      
                                                </select>
                                            </form>
                                            <div>
                                                <button>
                                                    Edit
                                                </button>  
                                            </div>
                                            <div>
                                                <button>
                                                    Delete
                                                </button>  
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </table>
                </div>    
            </div>
        <a href="{{ route('tasks.viewcreate', ['username' => $Account->username]) }}">Add Task</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>