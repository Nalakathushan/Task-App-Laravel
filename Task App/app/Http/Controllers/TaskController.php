<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        //  dd($request->all());  /*dd-diedonr*/
        $task = new Task;
        $this->validate($request, [
            'task' => 'required|max:100|min:5',

        ]);
        $task->task = $request->task;
        $task->save();
        $data = Task::all();
        //dd($data);
        return view('tasks')->with('tasks', $data);
    }
    public function UpdateTaskAsCompleted($id)
    {
        $task = Task::find($id);
        $task->isCompleted = 1;
        $task->save();
        return redirect()->back();
    }
    public function UpdateTaskAsNotCompleted($id)
    {
        $task = Task::find($id);
        $task->isCompleted = 0;
        $task->save();
        return redirect()->back();
    }
    public function deletetask($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->back();
    }
    public function updatetaskview($id)
    {
        $task = Task::find($id);
        return view('updatetask')->with('taskdata', $task);
    }
    public function updatetask(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $task = $request->task;
        $data = Task::find($id);
        $data->task = $task;
        $data->save();
        $data = Task::all();
        return view('/tasks')->with('tasks', $data);
    }
}