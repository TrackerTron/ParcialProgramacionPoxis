<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {

    public function index() {
        return Task::all();
    }

    public function show(Task $task) {
        return $task;
    }

    public function store(Request $request) {

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
