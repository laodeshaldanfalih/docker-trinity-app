<!-- resources/views/tasks/edit.blade.php -->
@extends('layout')

@section('content')
    <div class="container bg-white border rounded-3" style="max-width: 540px">
        <div class="p-5 m-2 text-black text-center" style="max-width: 540px">
            <h1>Edit Task</h1>
            <a type="submit" class = "btn btn-primary w-255 " href="{{ route('tasks.index') }}">Go Back</a>
        </div>

        <div class="row d-flex flex-wrap justify-content-around pt-2 pb-5 m-2">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-floating mb-2 p-auto">
                    <input class="form-control" placeholder="Edit Title" type="text" id="title" name="title"
                        value="{{ $task->title }}">
                    <label for="title">Title:</label>
                </div>
                <div class="form-floating mt-2 p-auto">
                    <textarea class="form-control" placeholder="Edit Description" id="description" name="description" style="height: 256px">{{ $task->description }}</textarea>
                    <label for="description">Description:</label>
                </div>
            </form>
        </div>
    </div>
@endsection
