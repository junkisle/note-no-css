<div class="d-flex align-items-center my-2">
                            
    <div class="dropdown mx-2">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            =
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li class="dropdown-item text-muted">Perform an action</li>

            {{-- Status Options --}}
            <li>
                <form action="{{ route('tasks.update', ['task' => $Task->id]) }}" method="POST" class="dropdown-item p-0">
                    @csrf
                    @method('put')
                    <select name="status" class="form-select border-0" onchange="this.form.submit()">
                        <option disabled selected>Change status</option>
                        <option value="doing">Doing</option>
                        <option value="done">Done</option>
                    </select>
                </form>
            </li>

            <li>
                <form action="{{ route('tasks.viewedit', ['task' => $Task->id]) }}" method="GET">
                    @csrf
                    <button class="dropdown-item" type="submit">Edit</button>
                </form>
            </li>

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
    <h5 class="mb-0 mt-1">{{ $Task->title }}</h5>
</div>
<h6 class="mt-2 mx-5 px-4 py-1 text-wrap border-bottom border-3 border-dark">{{ $Task->description }}</h6>