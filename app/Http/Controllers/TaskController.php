<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        //$this->authorize('index', Item::class);

        $listTemplate = new \stdClass();
        $listTemplate->listType = __("tasks");
        $listTemplate->listTitle = __("Task List");
        $listTemplate->listHeaders = [__("Task Code"), __("Task Name")];
        $listTemplate->listColumns = ["code", "name"];
        $listTemplate->searchTitle = __("Task Code") . "/" .  __("Task Name");

        return view('tasks.index', compact('listTemplate'));

    }

    public function create()
    {
        //$this->authorize('create', Item::class);

        return view('tasks.create');
    }

    public function show($uuid)
    {
        // $this->authorize('show', $item);

        return view('tasks.show', compact('uuid'));
    }

    public function edit($uuid)
    {
        // $this->authorize('edit', $item);

        return view('tasks.edit', compact('uuid'));
    }

    public function delete($uuid)
    {
        // $this->authorize('edit', $item);

        return view('tasks.delete', compact('uuid'));
    }
}
