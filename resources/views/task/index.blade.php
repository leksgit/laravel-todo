@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-title">Task</h1>
            </div>
            <div class="row">
                <button class="button btn-info pull-right col-md-2" onclick="{{ $btn_show['js'] }}">{{ $btn_show['text'] }}</button>
                <button class="button btn-danger pull-right col-md-2" data-toggle="modal" data-target="#createTask">Add</button>
            </div>
            <div class="row">
                <div class="alert alert-tabel alert-danger" hidden>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Danger!</strong> <span class="danger-text"></span>
                </div>
                <table class="table" id="tasks_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>descriptions</th>
                        <th>priority</th>
                        <th>status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        @include('task.taskRowTable')
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @include('modals.add')
@stop