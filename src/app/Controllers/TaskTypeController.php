<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\TaskType;

class TaskTypeController
{
    public function index()
    {
        $task_types = TaskType::findAll();
        View::render([
            'view' => 'TaskTypes',
            'title' => 'Task Types',
            'layout' => 'MainLayout',
            'data' => ['task_types' => $task_types],
        ]);
    }
    public function create()
    {
        View::render([
            'view' => 'task-types/Create',
            'title' => 'Add Task Type',
            'layout' => 'MainLayout',
            'data' => [],
        ]);
    }

    public function store($postData)
    {
        $tasktype = new TaskType;
        $tasktype->name = $postData['name'];


        $tasktype->save();

        header('Location: /task-types');
    }

    public function edit($id)
    {
        $tasktype = TaskType::find($id);
        View::render([
            'view' => 'tasktype/Edit',
            'title' => 'Edit tasktype',
            'layout' => 'MainLayout',
            'data' => ['task_types' => $tasktype],
        ]);
    }

    public function update($id, $postData)
    {
        $tasktype = tasktype::find($id);

        $tasktype->name = $postData['name'];
        $tasktype->postal_code = $postData['postal_code'];
        $tasktype->point_id = $postData['point_id'];

        $tasktype->save();

        header('Location: /task-types');
    }

    public function destroy($id)
    {
        $tasktype = tasktype::find($id);
        $tasktype->delete();

        header('Location: /task-types');
    }
}
