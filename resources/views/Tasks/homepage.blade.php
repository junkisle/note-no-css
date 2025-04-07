<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>
    @if (session()->has('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <p>{{ $Account->username }}, welcome to tasks</p>
    <a href="{{ route('main.open' , ['username' => $Account->username]) }}">Back</a>
    <h1>Tasks</h1>
    
    <div class="container">
        <div class="row">
            <h2>Pending Tasks</h2>
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
                                                <form action="{{ route('tasks.viewedit', ['task' => $Task]) }}">
                                                    @csrf
                                                    <button>
                                                        Edit
                                                    </button>  
                                                </form>
                                            </div>
                                            <div>
                                                <form action="{{ route('tasks.destroy', ['task' => $Task]) }}" method="post" >
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="Delete">
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
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
                                                    <option value="doing">Doing</option>
                                                    <option value="pending">Pending </option>
                                                    <option value="done">Done</option>
                
                                                </select>
                                            </form>
                                            <div>
                                                <form action="{{ route('tasks.viewedit', ['task' => $Task]) }}">
                                                    @csrf
                                                    <button>
                                                        Edit
                                                    </button>  
                                                </form>
                                            </div>
                                            <div>
                                                <form action="{{ route('tasks.destroy', ['task' => $Task]) }}" method="post" >
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="Delete">
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
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
                                                    <option value="pending">Pending </option>
                                                    <option value="doing">Doing</option>
                                                </select>
                                            </form>
                                            <div>
                                                <form action="{{ route('tasks.viewedit', ['task' => $Task]) }}">
                                                    @csrf
                                                    <input type="submit" value="edit">
                                                </form>
                                            </div>
                                            <div>
                                                <form action="{{ route('tasks.destroy', ['task' => $Task]) }}" method="post" >
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="Delete">
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                            @endif
                        @endforeach
                    </table>
                </div>    
            </div>
        <a href="{{ route('tasks.viewcreate', ['username' => $Account->username]) }}">Add Task</a>
    </div>
</body>
</html>