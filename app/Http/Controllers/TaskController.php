<?php

namespace App\Http\Controllers;

use App\Models\{
    Task
};

use App\Http\Requests\{
    StoreTaskRequest,
    UpdateTaskRequest
};

class TaskController extends Controller
{
    protected $model;

    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    public function index()
    {
        $tasks = $this->model
            ->orderBy('status', 'desc')
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->simplePaginate(8);

        $templateVariables = [
            'tasks' => $tasks
        ];

        return view('tasks.index', $templateVariables);
    }

    public function show($ID)
    {
        session(['update.ID' => $ID]);

        if (($task = $this->model->find($ID)) == null)
            return redirect()
                ->route('tasks.index');

        $templateVariables = [
            'task' => $task
        ];

        return view('tasks.show', $templateVariables);
    }

    public function store(StoreTaskRequest $request)
    {
        $data = $request->all();

        $this->model->create($data);

        return redirect()
            ->route('tasks.index')
            ->with('message.success', 'Tarefa adicionada com sucesso!');
    }

    public function update(UpdateTaskRequest $request, $ID)
    {
        if (session()->get('update.ID') !== $ID)
            return redirect()
                ->route('tasks.show', session()->get('update.ID'));

        if (($task = $this->model->find($ID)) == null)
            return redirect()
                ->route('tasks.index');

        $data = $request->all();

        if ($task->update($data))
            return redirect()
                ->route('tasks.index')
                ->with('message.success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy($ID)
    {
        if (($task = $this->model->find($ID)) == null)
            return redirect()->route('tasks.index');

        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('message.success', 'Tarefa excluída com sucesso!');
    }

    public function status($ID)
    {
        if (($task = $this->model->find($ID)) == null)
            return redirect()->route('tasks.index');

        switch ($task->status) {
            case 0: {
                    $task->update(['status' => '1']);
                    return redirect()
                        ->route('tasks.index')
                        ->with('message.success', 'Tarefa concluída!');
                }
                break;
            case 1: {
                    $task->update(['status' => '0']);
                    return redirect()
                        ->route('tasks.index')
                        ->with('message.warning', 'Tarefa em andamento.');
                }
            default:
                return redirect()
                    ->route('tasks.index');
        }
    }

    /**
     * helper
     */
    public function getStatus($statusCode)
    {
        switch ($statusCode) {
            case 0:
                $status = [
                    'iconColor' => null,
                    'textStyle' => null,
                    'bgColor' => 'bg--success',
                    'actionIcon' => '<i class="fa-solid fa-check action__icon"></i>'
                ];
                break;
            case 1:
                $status = [
                    'iconColor' => 'text--success',
                    'textStyle' => 'text--line',
                    'bgColor' => 'bg--warning',
                    'actionIcon' => '<i class="fa-solid fa-xmark action__icon"></i>'
                ];
                break;
            default:
                $status = [];
        }

        return (object)$status;
    }
}
