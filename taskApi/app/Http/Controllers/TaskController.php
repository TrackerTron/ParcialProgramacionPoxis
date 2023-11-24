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

    public function show(Request $request, $id){
        return $task = Task::FindOrFail($id);
    }

    public function store(Request $request){
        $task = new Task();
        $task -> title = $request -> post("title");
        $task -> description = $request -> post("description");
        $task -> author_id = $request -> post("author_id");
        $task -> state_id = $request -> post("state_id");
        
        $task -> save();
        return $task;
    }

public function update(Request $request, $id){
    $task = Task::FindOrFail($id);
    $task -> title = $request -> post("title");
    $task -> description = $request -> post("description");
    $task -> author_id = $request -> post("author_id");
    $task -> state_id = $request -> post("state_id");
    
    $task -> save();

    return $task;
}


public function destroy(Request $request, $id){
     $task = Task::FindOrFail($id);
    $task -> delete();
    return [ "message" => "Deleted"];
}
}
