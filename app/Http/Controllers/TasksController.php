<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function tasksList()
    {
        $tasks = Task::all();
        return view('page.tasks', ['tasks' => $tasks]);
    }

    /**
     * Function, that create a new task
     * @param Request $request
     */
    public function createTask(Request $request)
    {
        Task::create([
            'name' => $request->name,
            'deadline' => $request->deadline
        ]);

        return back();
    }

    /**
     *Ajax function for make task done
     */
    public function taskDone()
    {
        $task = Task::where('id', '=', $_POST['task_id'])->firstOrFail();
        $task->progress = 'done';
        $task->save();
    }

    /**
     *Ajax function to remove task
     */
    public function taskRemove()
    {
        $task = Task::where('id', '=', $_POST['task_id'])->firstOrFail();
        $task->delete();
    }
}
