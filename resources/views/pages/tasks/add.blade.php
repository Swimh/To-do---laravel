<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Add task
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">

            <div class="row">
                <div class="col-6 m-auto">
                    <form action="{{ route('tasks.save') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
                            <div id="nameHelp" class="form-text">Name of the task</div>
                        </div>
                        <div class="mb-3">
                            <label for="categories" class="form-label">categories </label>
                            <select class="form-select" name="task_category_id" id="categories">
                                @foreach($categories as $category)
                                <option value="{{ $category->id}}">{{$category->name}}</option> 
                                @endforeach
                            </select> 
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary text-white">Add task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>