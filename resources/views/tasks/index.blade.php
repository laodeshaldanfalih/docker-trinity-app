@extends('layout')

@section('content')
    <div class="container bg-white border rounded-3" style="max-width: 540px">
        <div class="p-5 m-2  text-center" style="max-width: 540px">
            <h1>Tasks</h1>
        </div>

        <div class="mb-3">
            <div class="m-2 text-white text-center" style="max-width: 540px">
                <a class="btn btn-primary w-50" href="{{ route('tasks.create') }}">Create New Task</a>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3">{{ $message }}</div>
            @endif
        </div>

        <div class="row d-flex flex-wrap justify-content-around pt-2 pb-5 m-2">
            <ul class="list-group col-md-10">
                @foreach ($tasks as $task)
                    <li class="list-group-item position-relative task-item mb-3" onclick="location.href='{{ route('tasks.show', $task->id) }}'">
                        <h5 href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</h5>
                        <a type="submit" class="btn btn-warning btn-sm text-white edit-button" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                        <p class="text-wrap text-truncate">{{ $task->description }}</p>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <i class="fas fa-external-link-alt task-icon position-absolute"></i>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
