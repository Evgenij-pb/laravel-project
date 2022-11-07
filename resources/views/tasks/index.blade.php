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
                        <form action="{{route('tasks.destroy', $task ->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button><i class="fa fa-trash"></i></button>
                        </form>
                        <form action="{{route('task.edit', $task ->id)}}" method="post">
                            {{csrf_field()}}

                            <button><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        </form>

                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
       @endif
    @endsection