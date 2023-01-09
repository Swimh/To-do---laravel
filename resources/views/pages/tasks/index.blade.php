<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Tasks
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">

            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('tasks.add') }}" class="btn btn-primary text-white">Add task</a>
                </div>
            </div>

            <div class="row">
                <div class="col-1">
                    <form action="#" method="GET">
                        <div class="mb-3">
                            <label for="items">Nr of items</label>
                            <select name="items" class="form-select" id="items">
                                <option value="5" {{isset($_GET['items']) && $_GET['items'] == 5 ? 'selected' : '' }}>5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-3">
                <form action="{{route('tasks.search')}}" method="GET">
                    <label for="search">Search:</label>
                    <input type="text" class="form-control" name="search" id="search">
                    <button type="submit" class="btn btn-sm btn-primary text-white">Search</button>
                </form>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{$task->name}}</td>
                                    <td>{{$task->taskCategory ? $task->taskCategory->name : 'uncategorized'}}</td>
                                    <td>{{$task->description}}</td>
                                    <td>{{$task->user->name}}</td>
                                    <td>{{ strtoupper(App\General\Concretes\Enums\TaskStatus::getValueById($task->status_id)) }}</td>
                                    <td>{{$task->created_at}}</td>
                                    <td>{{$task->updated_at}}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('tasks.show',['task' => $task->id])}}" class="btn btn-sm btn-primary text-white">V</a>
                                        <a href="{{ route('tasks.edit',[ 'task'=> $task->id ]) }}" class="btn btn-sm btn-success text-white mx-2">E</a>
                                        <form action="{{ route('tasks.delete',[ 'task' => $task->id ]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger text-white">D</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$tasks->links()}}
                </div>
            </div>

            
        </div>
    </div>
</x-app-layout>