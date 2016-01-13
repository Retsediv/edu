<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     */
    public function __construct()
    {
        
    }

    /**
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function edit(User $user, Task $task)
    {
        return $user->id === $task->user_id;
    }
}
