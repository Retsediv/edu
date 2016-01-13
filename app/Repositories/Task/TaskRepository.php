<?php
namespace App\Repositories\Task;

use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TaskRepository implements TaskInterface
{

    use AuthorizesRequests;

    public function forUser(Request $request)
    {
        $tasks = $request->user()->tasks;

        return $tasks;
    }

    public function create(Request $request)
    {

        Task::create([
            'name' => $request->name,
            'deadline' => $request->deadline,
            'user_id' => $request->user()->id
        ]);

    }

    public function done($taskId)
    {
        $task = $this->getByIdAndAuthorize($taskId);

        $task->progress = 'done';
        $task->save();

    }

    public function remove($taskId)
    {
        $task = $this->getByIdAndAuthorize($taskId);

        $task->delete();
    }

    public function edit($taskId, Request $request)
    {
        $task = $this->getByIdAndAuthorize($taskId);

        $task->name = $request->name;
        $task->deadline = $request->deadline;
        $task->progress = '';

        $task->save();
    }

    public function getById($id)
    {
        $task = Task::where('id', '=', $id)->firstOrFail();

        return $task;
    }

    public function getByIdAndAuthorize($id)
    {
        $task = $this->getById($id);

        $this->authorize('edit', $task);

        return $task;
    }
}