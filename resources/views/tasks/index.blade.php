@extends('layouts.app')

@section('content')
    <h2>All task</h2>
    <a href="{{route('task.create')}}">Create new task</a>
    <!-- TODO: Текущие задачи -->

        @if (count($tasks) > 0)
        <div class="panel panel-default">
          <div class="panel-heading">
           Tasks
          </div>

          <div class="panel-body">
            <table class="table table-striped task-table">

              <!-- Заголовок таблицы -->
              <thead>
              <rt>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Action</th>
              </rt>

              </thead>

              <tbody>
                @foreach ($tasks as $task)
                  <tr>
                    <td>
                        <div>{{$task -> id}}</div>
                    </td>
                    <td class="table-text">
                      <div>{{ $task->name }}</div>
                    </td>

                    <td>
                      <!-- TODO: Кнопка Удалить -->
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
       @endif
    @endsection