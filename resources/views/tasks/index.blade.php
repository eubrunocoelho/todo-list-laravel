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
        <div class="task">
            <div class="task__icon-box">
                <i class="fa-solid fa-clipboard-list task__icon text--success"></i>
            </div>
            <h2 class="task__title text--line">Finalizar template To Do List</h2>
            <div class="task__actions">
                <a href="./edit.html" class="action__box bg--blue">
                    <i class="fa-solid fa-pen action__icon"></i>
                </a>
                <a href="#" class="action__box bg--danger">
                    <i class="fa-solid fa-trash action__icon"></i>
                </a>
                <a href="#" class="action__box bg--warning">
                    <i class="fa-solid fa-xmark action__icon"></i>
                </a>
            </div>
        </div>
        <div class="task">
            <div class="task__icon-box">
                <i class="fa-solid fa-clipboard-list task__icon"></i>
            </div>
            <h2 class="task__title">Programar PHP usando Laravel</h2>
            <div class="task__actions">
                <a href="./edit.html" class="action__box bg--blue">
                    <i class="fa-solid fa-pen action__icon"></i>
                </a>
                <a href="#" class="action__box bg--danger">
                    <i class="fa-solid fa-trash action__icon"></i>
                </a>
                <a href="#" class="action__box bg--success">
                    <i class="fa-solid fa-check action__icon"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection