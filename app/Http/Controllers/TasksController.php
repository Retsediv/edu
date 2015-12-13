<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function tasksList(Request $request)
    {
        return view('page.tasks');
    }


    /**
     * API function to get all tasks from db of current user.
     * @param Request $request
     * @return mixed
     */
    public function getAllTasks(Request $request)
    {
        $tasks = $request->user()->tasks;
        return response()->json($tasks);
    }


    /**
     * API function, that create a new task
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createTask(Request $request)
    {

        Task::create([
            'name' => $request->name,
            'deadline' => $request->deadline,
            'user_id' => $request->user()->id
        ]);

    }

    /**
     *API function for make task done
     * @param Request $request
     */
    public function taskDone(Request $request)
    {
        $taskId = $request->id;
        $this->checkId($taskId, $request);

        $task = Task::where('id', '=', $taskId)->firstOrFail();
        $task->progress = 'done';
        $task->save();

    }

    /**
     *API function to remove task
     * @param Request $request
     */
    public function taskRemove(Request $request)
    {
        $taskId = $request->id;

        $this->checkId($taskId, $request);

        $task = Task::where('id', '=', $taskId)->firstOrFail();
        $task->delete();
    }

    public function taskEdit(Request $request)
    {
        $id = $request->id;

        $this->checkId($id, $request);

        $task = Task::find($id);
        $task->name = $request->name;
        $task->deadline = $request->deadline;
        $task->save();

    }

    public function checkId($id, $request)
    {
        if(!($request->user()->tasks->contains($id))){
            abort(404);
        }
    }
}
