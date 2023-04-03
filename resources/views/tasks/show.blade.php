@extends('layout.app')

@section('title', 'Atualizar Tarefa')

@section('content')
    <section class="section">
        <div class="section-heading">
            <div class="section-heading__icon"></div>
            <h1 class="section-heading__title">To Do List</h1>
        </div>
        <div class="edit-task">
            <form action="{{ route('tasks.update', $task->id) }}" class="edit-task__form" method="POST">
                @csrf
                <input type="text" class="edit-task__input" id="task" name="task" value="{{ $task->task ?? old('task') }}">
                <div class="edit-task__group">
                    <button class="edit-task__btn bg--blue" type="submit"><span class="edit-task__icon"><i class="fa-solid fa-pen"></i></span>Editar</button>
                    <button class="edit-task__btn bg--warning" onclick="window.location.href='./index.html'; return false;"><span class="edit-task__icon"><i class="fa-solid fa-rotate-left"></i></span>Cancelar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
