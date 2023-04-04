@inject('taskStatus', \App\Http\Controllers\TaskController::class)

@extends('layout.app')

@section('title', 'Lista de Tarefas')

@section('content')
    @if(session('message.warning'))
        <section class="section alert mb--20 box--warning">
            <p>{{ session('message.warning') }}</p>
        </section>
    @endif
    @if(session('message.success'))
        <section class="section alert mb--20 box--success">
            <p>{{ session('message.success') }}</p>
        </section>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <section class="section alert mb--20 box--danger">
                <p>{{ $error }}</p>
            </section>
        @endforeach
    @endif
    <section class="section">
        <div class="section-heading">
            <div class="section-heading__icon"></div>
            <h1 class="section-heading__title">To Do List</h1>
        </div>
        <div class="new-task">
            <form action="{{ route('tasks.store') }}" class="new-task__form" method="POST">
                @csrf
                <input type="text" class="new-task__input" placeholder="Nova tarefa..." id="task" name="task" value="{{ old('task') }}">
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
                        <a href="{{ route('tasks.update', $task->id) }}" class="action__box bg--blue">
                            <i class="fa-solid fa-pen action__icon"></i>
                        </a>
                        <a href="{{ route('tasks.delete', $task->id) }}" class="action__box bg--danger">
                            <i class="fa-solid fa-trash action__icon"></i>
                        </a>
                        <a href="{{ route('tasks.status', $task->id) }}" class="action__box {{ $status->bgColor }}">
                            {!! $status->actionIcon !!}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @if(isset($tasks))
    <nav class="pagination">
        <ul class="pagination__list">
            @if($tasks->currentPage() > 1)
                <li class="pagination__item">
                    <a href="{{ $tasks->previousPageUrl() }}" class="pagination__link">«</a>
                </li>
            @else
                <li class="pagination__item">
                    <span class="pagination__link">«</span>
                </li>
            @endif
            @if($tasks->currentPage())
                <li class="pagination__item">
                    <span class="pagination__link box--active">{{ $tasks->currentPage() }}</span>
                </li>
            @endif
            @if($tasks->hasMorePages())
                <li class="pagination__item">
                    <a href="{{ $tasks->nextPageUrl() }}" class="pagination__link">»</a>
                </li>
            @else
                <li class="pagination__item">
                    <span class="pagination__link">»</span>
                </li>
            @endif
        </ul>
    </nav>
    @endif
@endsection
