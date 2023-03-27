<?php

namespace App\Http\Controllers;

use App\Models\{
    Task
};

use App\Http\Requests\{
    StoreTaskRequest
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
        // $data = $request->all();
        // $data['status'] = 2;

        $tasks = $this->model->all();

        $templateVariables = [
            'tasks' => $tasks
        ];

        // $this->model->create($data);

        return view('tasks.index', $templateVariables);
    }

    public function store(StoreTaskRequest $request)
    {
        $data = $request->all();

        dd($data);

        return redirect()->route('tasks.index');
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
