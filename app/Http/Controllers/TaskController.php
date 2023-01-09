<?php

namespace App\Http\Controllers;

use App\General\Concretes\Enums\TaskStatus;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Mail\TaskEdited;
use App\Models\Task;
use App\Models\TaskCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $numberOfItems = $request->get('items');
        $tasks = Task::paginate($numberOfItems ? $numberOfItems :5);

        return view('pages.tasks.index',[
            'tasks' => $tasks
        ]);
    }

    /**
     * Function that returns add form
     */
    public function add()
    {
        return view('pages.tasks.add',[
            'categories' => TaskCategory::all()
        ]);
    }

    /**
     * Function that inserts a new task into the database
     */
    public function save(StoreTaskRequest $request)
    {
        if($request->validated()){
            $args = $request->only(['name','description','task_category_id']);

            $args['user_id'] = Auth::user()->id;

            $task = new Task($args);
    
            $task->save();
    
            return redirect()->route('tasks.index')->with("success","Task: $task->name introdus cu succes!");
        }
    }

    /**
     * Function that returns the edit view
     */
    public function edit(Task $task)
    {
        return view('pages.tasks.edit',[
            'task' => $task,
            'statuses' => TaskStatus::getEnum()
        ]);
    }

    /**
     * Function that handles the update logic
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        if($request->validated())
        {
            $args = $request->only(['name','description', 'status_id']);

            $task->update($args);
            if($task->assignedUser != null){
                Mail::to($task->assignedUser->email)->send(new TaskEdited($task->assignedUser,$task));
            }
            

            return redirect()->back()->with('success','Task updated successfully');
        }
    }


    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->back()->with('success','Task deleted');
    }

    public function show(Task $task)
    {
        return view('pages.tasks.show',[
            'task' => $task,
            'taskStatus' => TaskStatus::getValueById($task->status_id)
        ]);
    }

    public function search(Request $request){
        $search = $request->get('search');

        $tasks = Task::where('name', 'LIKE', "%$search%")->paginate(5);

        return view('pages.tasks.index',[
            'tasks' => $tasks
        ]);
    }


}

