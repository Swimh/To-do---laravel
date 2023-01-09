<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Task Categories
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <a href="{{ route ('task-categories.add')}}" class="btn btn-primary text-white"> Add category</a>
        </div>
    </div>

    @if(count($categories) > 0)
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-3">
            <div class="card my-4 shadow">
                <div class="card-body">
                    <div class="text-center">
                        <h3>{{$category->name}}</h3>
                        <p>tasks: {{ $category->tasks->count()}}</p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-around">
                    <a href="#" class="btn btn-sm btn-success">Edit</a>
                    <form action="{{ route('task-categories.delete', [ 'taskCategory' => $category->id ]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger text-white">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    @else 
        <div class="row">
            <div class="col-12 text-center">
                <h2>no categories found</h2>
            </div>
        </div>
    @endif

    <div class="card my-4">
        <div class="card-body">
            You're logged in!
        </div>
    </div>
</x-app-layout>