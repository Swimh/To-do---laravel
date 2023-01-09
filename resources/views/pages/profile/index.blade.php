<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Profile
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-3">
            <div class="card my-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <img src="{{$user->profile_image ? '/' . $user->profile_image : 'https://via.placeholder.com/150'}}" class="img-fluid rounded" alt="pic"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="profile_image">Profile image</label>
                                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary text-white">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card my-4">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="tasks-tab" data-bs-toggle="tab" data-bs-target="#tasks-tab-pane" type="button" role="tab" aria-controls="tasks-tab-pane" aria-selected="true">Tasks</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tasks-tab-pane" role="tabpanel" aria-labelledby="tasks-tab" tabindex="0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user->tasks as $task)
                                        <tr>
                                            <td>{{$task->name}}</td>
                                            <td>{{$task->description}}</td>
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
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>