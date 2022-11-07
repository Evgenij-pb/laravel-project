@extends('layouts.app')

@section('content')
    <h2>Edit task</h2>

    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма редактирования задачи -->
        <form action="{{ route('task.update', $task ->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{method_field('PUT')}}

        <!-- Имя задачи -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Задача</label>

                <div class="col-sm-6">

                    @if(!old('name'))
                        <input type="text" name="name" id="task" class="form-control" value="{{ $task->name }}">
                    @else
                        <input type="text" name="name" id="task" class="form-control" value="{{ old('name') }}">
                    @endif

                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection