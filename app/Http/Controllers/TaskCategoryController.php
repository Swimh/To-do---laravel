<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskCategoryRequest;
use App\Models\TaskCategory;
use Illuminate\Http\Request;

class TaskCategoryController extends Controller
{
    public function index() {
        return view('pages.taskCategories.index', [
            'categories' => TaskCategory::all()
            //numele cheii devine variabila in view 'categories'
        ]);
    }

    public function add() {
        return view('pages.taskCategories.add');
    }

    public function save(StoreTaskCategoryRequest $request) {
        if($request->validated()) {
            $args = $request->only(['name']);

            $category = new TaskCategory($args);

            $category->save();

            return redirect()->back()->with('success', 'category added succesfully');
        }
    }

    public function delete(TaskCategory $taskCategory) {

        $taskCategory->delete();

        return redirect()->back()->with('success', 'TaskCategory deleted');
    }
    
    
}
