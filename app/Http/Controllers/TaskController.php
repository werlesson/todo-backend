<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function update(Request $request)
    {
        $task = Task::findOrFail($request->taskId);
        if (!$task) {
            return ['success' => false];
        }
        $task->is_done = $request->status;
        $task->save();
        return ['success' => true];
    }

    public function index(Request $request)
    {
        return view('home');
    }

    public function create(Request $request)
    {
        $data['categories'] = Category::all();

        return view('tasks.create', $data);
    }

    public function create_action(Request $request)
    {
        $task = $request->except('_token');
        $task['user_id'] = 1;
        Task::create($task);
        return redirect(route('home'));
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);

        if (!$task) {
            return redirect(route('home'));
        }

        $data['task'] = $task;
        $data['categories'] = Category::all();

        return view('tasks.edit', $data);
    }

    public function edit_action(Request $request)
    {
        $request_update = $request->except('_token', 'id');
        $request_update['is_done'] = $request->is_done ? true : false;

        $task = Task::find($request->id);

        if (!$task) {
            return redirect(route('home'));
        }

        $task->update($request_update);
        $task->save();

        return redirect(route('home'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        if ($task) {
            $task->delete();
        }
        return redirect(route('home'));
    }
}
