<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Repositories\Task\TaskInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{

    use AuthorizesRequests;

    private $task;

    public function __construct(TaskInterface $task)
    {
        $this->task = $task;
    }

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
        $tasks = $this->task->forUser($request);

        return response()->json($tasks);
    }


    /**
     * API function, that create a new task
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createTask(Request $request)
    {
        $this->task->create($request);
    }

    /**
     * API function for make task done
     * @param Request $request
     */
    public function taskDone(Request $request)
    {
        $taskId = $request->id;

        $this->task->done($taskId);
    }

    /**
     * API function to remove task
     * @param Request $request
     */
    public function taskRemove(Request $request)
    {
        $taskId = $request->id;

        $this->task->remove($taskId);
    }

    public function taskEdit(Request $request)
    {
        $taskId = $request->id;

        $this->task->edit($taskId, $request);
    }
}
