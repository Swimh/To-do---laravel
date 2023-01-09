<div>
    <h3>Hello {{$user->name}}</h3>

    <p>This task has been edited: <a href="{{route('tasks.show',['task' =>$task->id])}}">{{$task->name}}</a></p>
</div>