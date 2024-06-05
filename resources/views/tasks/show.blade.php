<!-- resources/views/tasks/show.blade.php -->
@extends('layout')

@section('content')
    <div class="container bg-white border rounded-3" style="max-width: 540px">
        <div class="p-5 m-2 text-black text-center" style="max-width: 540px">
            <h1>{{ $task->title }}</h1>
        </div>
        <div class="row d-flex flex-wrap justify-content-around pt-2 pb-5 m-2">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">

                <div class="form-floating mt-2 p-auto">
                    <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 256px" disabled>{{ $task->description }}</textarea>
                    <label for="description">Description</label>
                </div>
                <a type="submit" class="btn btn-primary mt-5 text-white" href="{{ route('tasks.index') }}">Back to list</a>
            </form>
        </div>
    </div>
@endsection
