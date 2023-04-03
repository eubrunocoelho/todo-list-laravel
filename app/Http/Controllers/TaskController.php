<?php

namespace App\Http\Controllers;

use App\Models\{
    Task
};

use App\Http\Requests\{
    StoreTaskRequest,
    UpdateTaskRequest
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

    public function show($ID)
    {
        if (($task = $this->model->find($ID)) == null)
            return redirect()->route('tasks.index');

        $templateVariables = [
            'task' => $task
        ];

        return view('tasks.show', $templateVariables);
    }

    public function store(StoreTaskRequest $request)
    {
        $data = $request->all();

        $this->model->create($data);

        return redirect()->route('tasks.index');
    }

    public function update(UpdateTaskRequest $request, $ID)
    {
        $data = $request->all();

        return redirect()->route('tasks.show', ['ID' => $ID]);
    }

    public function getStatus($statusCode)
    {
        switch ($statusCode) {
            case 1:
                $status = [
                    'iconColor' => 'text--success',
                    'textStyle' => 'text--line',
                    'bgColor' => 'bg--warning',
                    'actionIcon' => '<i class="fa-solid fa-xmark action__icon"></i>'
                ];
                break;
            case 2:
                $status = [
                    'iconColor' => null,
                    'textStyle' => null,
                    'bgColor' => 'bg--success',
                    'actionIcon' => '<i class="fa-solid fa-check action__icon"></i>'
                ];
                break;
            default:
                $status = [];
        }

        return (object)$status;
    }
}
