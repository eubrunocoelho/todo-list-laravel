@extends('layout.app')

@section('title', 'Lista de Tarefas')

@section('content')
    <section class="section">
        <div class="section-heading">
            <div class="section-heading__icon"></div>
            <h1 class="section-heading__title">To Do List</h1>
        </div>
        <div class="new-task">
            <form action="{{ route('tasks.index') }}" class="new-task__form">
                <input type="text" class="new-task__input" placeholder="Nova tarefa...">
                <button class="new-task__btn">
                    <i class="fa-solid fa-plus new-task__icon"></i>
                </button>
            </form>
        </div>
        <div class="tasks">
            @foreach ($tasks as $task)
                @if ($task->status == 1)
                    @php
                        $status['text-style'] = ' text--success';
                        $status['text-line'] = '  text--line';
                        $status['bg-color'] = ' bg--warning';
                        $status['action-icon'] = '<i class="fa-solid fa-xmark action__icon"></i>';
                    @endphp
                @elseif($task->status == 2)
                    @php
                        $status['text-style'] = null;
                        $status['text-line'] = null;
                        $status['bg-color'] = ' bg--success';
                        $status['action-icon'] = '<i class="fa-solid fa-check action__icon"></i>';
                    @endphp
                @endif
                <div class="task">
                    <div class="task__icon-box">
                        <i class="fa-solid fa-clipboard-list task__icon{{ $status['text-style'] }}"></i>
                    </div>
                    <h2 class="task__title{{ $status['text-line'] }}">{{ $task->task }}</h2>
                    <div class="task__actions">
                        <a href="./edit.html" class="action__box bg--blue">
                            <i class="fa-solid fa-pen action__icon"></i>
                        </a>
                        <a href="#" class="action__box bg--danger">
                            <i class="fa-solid fa-trash action__icon"></i>
                        </a>
                        <a href="#" class="action__box{{ $status['bg-color'] }}">
                            {!! $status['action-icon'] !!}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
