<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Task;
use App\User;

class TaskPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user->hasPermission('tasks.index');
    }

    public function show(User $user, Task $task)
    {
        return $user->hasPermission('tasks.show');
    }

    public function create(User $user)
    {
        return $user->hasPermission('tasks.create');
    }

    public function update(User $user, Task $task)
    {
        return $user->hasPermission('tasks.update');
    }

    public function delete(User $user, Task $task)
    {
        return $user->hasPermission('tasks.delete');
    }
}
