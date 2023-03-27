@extends('layout.app')

@section('title', 'Atualizar Tarefa')

@section('content')
    <section class="section">
        <div class="section-heading">
            <div class="section-heading__icon"></div>
            <h1 class="section-heading__title">To Do List</h1>
        </div>
        <div class="edit-task">
            <form action="#" class="edit-task__form">
                <input type="text" class="edit-task__input" placeholder="Finalizar template To Do List" value="Finalizar template To Do List">
                <div class="edit-task__group">
                    <button class="edit-task__btn bg--blue"><span class="edit-task__icon"><i class="fa-solid fa-pen"></i></span>Editar</button>
                    <button class="edit-task__btn bg--warning" onclick="window.location.href='./index.html'; return false;"><span class="edit-task__icon"><i class="fa-solid fa-rotate-left"></i></span>Cancelar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
