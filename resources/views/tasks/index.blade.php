@inject('taskStatus', \App\Http\Controllers\TaskController::class)

@extends('layout.app')

@section('title', 'Lista de Tarefas')

@section('content')
    @if ($errors->any())
        {{ dd($errors->all()) }}
    @endif
    <section class="section">
        <div class="section-heading">
            <div class="section-heading__icon"></div>
            <h1 class="section-heading__title">To Do List</h1>
        </div>
        <div class="new-task">
            <form action="{{ route('tasks.store') }}" class="new-task__form" method="POST">
                @csrf
                <input type="text" class="new-task__input" placeholder="Nova tarefa..." id="task" name="task">
                <button class="new-task__btn" type="submit">
                    <i class="fa-solid fa-plus new-task__icon"></i>
                </button>
            </form>
        </div>
        <div class="tasks">
            @foreach ($tasks as $task)
                @php
                    $status = $taskStatus->getStatus($task->status);
                @endphp
                <div class="task">
                    <div class="task__icon-box">
                        <i class="fa-solid fa-clipboard-list task__icon {{ $status->iconColor }}"></i>
                    </div>
                    <h2 class="task__title {{ $status->textStyle }}">{{ $task->task }}</h2>
                    <div class="task__actions">
                        <a href="./edit.html" class="action__box bg--blue">
                            <i class="fa-solid fa-pen action__icon"></i>
                        </a>
                        <a href="#" class="action__box bg--danger">
                            <i class="fa-solid fa-trash action__icon"></i>
                        </a>
                        <a href="#" class="action__box {{ $status->bgColor }}">
                            {!! $status->actionIcon !!}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
