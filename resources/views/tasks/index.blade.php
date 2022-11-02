@extends('layouts.app')

@section('content')
    <h2>All task</h2>
    <a href="{{route('task.create')}}">Create new task</a>
    <!-- TODO: Текущие задачи -->
@endsection