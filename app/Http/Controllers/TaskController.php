<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Project $project) {
        $data = request()->validate([
            'body' => 'required',
        ]);

        $data['project_id'] = $project->id;

        Task::create($data);

        return back();
    }

    public function update(Project $project, Task $task) {
        abort_if(!isset($project) || !isset($task), 404);

        abort_if(auth()->id() !== $project->user_id, 403);

        $task->update([
            'body' => request('body') ?? $task->body,
            'completed' => request()->has('completed'),
        ]);

        return back();
    }

    public function destroy(Project $project, Task $task) {
        abort_if(!isset($project) || !isset($task), 404);

        abort_if(auth()->id() !== $project->user_id, 403);

        $task->delete();

        return back();
    }
}
