<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {

    public function index() {
        $tasks = Task::paginate(10);     
        return response()->json([
            'tasks' => $tasks->items(),
            'current_page' => $tasks->currentPage(),
            'total' => $tasks->total(),
        ]);
    }

    public function show(Task $task) {
        return $task;
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'state_id' => 'required|exists:states,id',
            'text_file' => 'file|mimes:txt,pdf|max:10240', 
        ]);
    
        $task = Task::create($request->only(['title', 'description', 'author_id', 'state_id']));
    
        $task->author_id = auth()->user()->id;
        $task->save();
        
        return response()->json($task, 201);
    }

    public function update(Request $request, Task $task) {
        $task->update($request->only(['title', 'description', 'state_id']));
        return response()->json($task, 200);
    }

    public function destroy(Task $task) {
        $task->delete();
        return response()->json(null, 204);
    }
}
