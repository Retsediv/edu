<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function tasksList(Request $request)
    {
        $tasks = $request->user()->tasks;
        return view('page.tasks', ['tasks' => $tasks]);
    }

    /**
     * Function, that create a new task
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createTask()
    {
        Task::create([
            'name' => $request->name,
            'deadline' => $request->deadline,
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    /**
     *Ajax function for make task done
     * @param Request $request
     */
    public function taskDone(Request $request)
    {
        $this->checkId($_POST['task_id'], $request);

        $task = Task::where('id', '=', $_POST['task_id'])->firstOrFail();
        $task->progress = 'done';
        $task->save();

    }

    /**
     *Ajax function to remove task
     * @param Request $request
     */
    public function taskRemove(Request $request)
    {
        $this->checkId($_POST['task_id'], $request);

        $task = Task::where('id', '=', $_POST['task_id'])->firstOrFail();
        $task->delete();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function taskEdit($id, Request $request)
    {
        $this->checkId($id, $request);

        $task = Task::find($id);
        $tasks = $request->user()->tasks;

        return view('page.tasks', ['editask' => $task, 'tasks' => $tasks]);
    }

    public function taskEditPatch($id, Request $request)
    {
        $this->checkId($id, $request);
        $task = Task::find($id);
        $task->name = $request->name;
        $task->deadline = $request->deadline;
        $task->save();
        return redirect(route('tasks'));
    }

    public function checkId($id, $request)
    {
        if(!($request->user()->tasks->contains($id))){
            exit(redirect('/', 301));
        }
    }
}
