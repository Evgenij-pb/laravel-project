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
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">

                        <input type="text" name="name" id="task" class="form-control" value="{{ old('name') ??  $task->name }}">

                </div>

            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection