<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = auth()->user()->tasks();
        if ($request->has('status') && !is_null($request->status)) {
            $tasks->where('status', $request->status);
        }

        if ($request->has('priority') && !is_null($request->priority)) {
            $tasks->where('priority', $request->priority);
        }

        $tasks = $tasks->get();

        return view('dashboard', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|boolean',  
            'priority' => 'required|integer|in:1,2,3',  
        ]);

        Task::create([
        'title' => $request->title,
        'description' => $request->description,
        'status' => $request->status,  
        'priority' => $request->priority,  
        'user_id' => auth()->id(),  
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function edit(Task $task)
    {
        if ($task->user_id != auth()->id()) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to edit this task.')->with('error_task_id', $task->id);
        }
    
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',          
            'description' => 'required|string',          
            'status' => 'required|boolean',              
            'priority' => 'required|integer|in:1,2,3',    
        ]);
      
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,  
            'priority' => $request->priority, 
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
    
    public function destroy(Task $task)
    {
        if ($task->user_id != auth()->id()) {
            return redirect()->route('tasks.index')->with('error', 'You are not authorized to delete this task.')->with('error_task_id', $task->id);
        }
    
        $task->delete();
    
        return redirect()->route('tasks.index');
    }
}
