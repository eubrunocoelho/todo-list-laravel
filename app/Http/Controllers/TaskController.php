<?php

namespace App\Http\Controllers;

use App\Models\{
    Task
};

use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $model;

    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    public function index()
    {
        $tasks = $this->model->all();

        $templateVariables = [
            'tasks' => $tasks
        ];

        return view('tasks.index', $templateVariables);
    }
}
