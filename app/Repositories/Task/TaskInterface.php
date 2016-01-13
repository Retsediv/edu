<?php
namespace App\Repositories\Task;

use Illuminate\Http\Request;

interface TaskInterface
{

    public function forUser(Request $request);

    public function create(Request $request);

    public function done($taskId);

    public function remove($taskId);

    public function edit($taskId, Request $request);
}