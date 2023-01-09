<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Add cat
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">

            <div class="row">
                <div class="col-6 m-auto">
                    <form action="{{ route('task-categories.save') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp">
                            <div id="nameHelp" class="form-text">Name of the task</div>
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary text-white">Add cat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>