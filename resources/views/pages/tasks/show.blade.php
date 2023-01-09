<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Task: {{$task->name}}   
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-4">
            <div class="card my-4">
                <div class="card-body">
                    <h3>{{$task->name}}</h3>
                    <p>Created at: {{$task->created_at}}</p>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card my-4">
                <div class="card-body">
                    <p>{{$task->description}}</p>
                    <p>Status: {{ $taskStatus }}</p>
                    <p>Assigned user: {{$task->assignedUser ? $task->assignedUser->name : 'unsigned'}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>