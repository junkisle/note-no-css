<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <p>{{ $Account->username }}, welcome to tasks</p>

    <h1>Tasks</h1>
    <div class="container">
        <div class="row">
                <div class="col-4">
                    <table class="table table-bordered">
                        <tr>
                            <th>
                                Title
                            </th>
                            <th>
                                Desciption
                            </th>
                            <th>
                                Status      
                            </th>
                            <th>
                                Edit
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
                
                                        <td>
                                            {{ $Task->status }}
                                        </td>
                                        <td>                   <!-- indicate task id vvv to be passed to route -->
                                            <form action="{{ route('tasks.update', ['task' => $Task->id]) }}" method="post" >
                                                @csrf
                                                @method('put')
                                                <select name="status" onchange="this.form.submit()">
                                                    <option value="" disabled selected>Select status </option>
                                                    <option value="pending">Pending</option>
                                                    <option value="doing">Doing</option>
                                                    <option value="done">Done</option>
                
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </table>
                </div>
                <div class="col-4">
                    <table class="table">
                        <tr>
                            <th>
                                Title
                            </th>
                            <th>
                                Desciption
                            </th>
                            <th>
                                Status      
                            </th>
                            <th>
                                Edit
                            </th>
                        </tr>

                        @foreach( $Tasks as $Task)
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
                                            {{ $Task->status }}
                                        </td>
                                        <td>                   <!-- indicate task id vvv to be passed to route -->
                                            <form action="{{ route('tasks.update', ['task' => $Task->id]) }}" method="post" >
                                                @csrf
                                                @method('put')
                                                <select name="status" onchange="this.form.submit()">
                                                    <option value="" disabled selected>Select status </option>
                                                    <option value="pending">Pending</option>
                                                    <option value="doing">Doing</option>
                                                    <option value="done">Done</option>

                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </table>
                </div>
                <div class="col-4">
                    <table class="table">   
                        <tr>
                            <th>
                                Title
                            </th>
                            <th>
                                Desciption
                            </th>
                            <th>
                                Status      
                            </th>
                            <th>
                                Edit
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

                                        <td>
                                            {{ $Task->status }}
                                        </td>
                                        <td>                   <!-- indicate task id vvv to be passed to route -->
                                            <form action="{{ route('tasks.update', ['task' => $Task->id]) }}" method="post" >
                                                @csrf
                                                @method('put')
                                                <select name="status" onchange="this.form.submit()">
                                                    <option value="" disabled selected>Select status </option>
                                                    <option value="pending">Pending</option>
                                                    <option value="doing">Doing</option>
                                                    <option value="done">Done</option>

                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </table>
                </div>    
            </div>
        <a class="btn btn-primary" href="{{ route('tasks.viewcreate', ['username' => $Account->username]) }}">Add Task</a>
    </div>
</body>
</html>