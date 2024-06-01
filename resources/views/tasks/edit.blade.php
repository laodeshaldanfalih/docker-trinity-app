<!-- resources/views/tasks/edit.blade.php -->
@extends('layout')

@section('content')
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $task->title }}">
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $task->description }}</textarea>
        <button type="submit">Update</button>
    </form>
@endsection
