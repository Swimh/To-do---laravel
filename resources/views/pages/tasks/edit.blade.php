<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Edit task: {{$task->name}}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">

            <div class="row">
                <div class="col-6 m-auto">
                    <form action="{{route('tasks.update',['task' => $task->id])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" value="{{$task->name}}">
                            <div id="nameHelp" class="form-text">Name of the task</div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status_id" id="status" class="form-select">
                                @foreach($statuses as $key => $value)
                                    <option value="{{ $value }}" {{ $task->status_id === $value ? 'selected' : ''}}>{{strtoupper($key)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5">{{$task->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary text-white">Edit task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>