<!-- resources/views/tasks/create.blade.php -->
@extends('layout')

@section('content')
    <div class="container bg-white border rounded-3" style="max-width: 540px">


        <div class="p-5 m-2 text-black text-center" style="max-width: 540px">
            <h1>Create Task</h1>
            <a type="submit" class = "btn btn-primary w-255 " href="{{ route('tasks.index') }}">Go Back</a>
        </div>

        <div class="row d-flex flex-wrap justify-content-around pt-2 pb-5 m-2">
            <form action="{{ route('tasks.store') }}" method="POST" class="list-group col-md-10">
                @csrf
                <div class="form-floating mb-2 p-auto">
                    <textarea class="form-control" placeholder="Title" id="title" name="title"></textarea>
                    <label for="title">Title:</label>
                </div>
                <div class="form-floating mt-2 p-auto">
                    <textarea class="form-control" placeholder="Description" id="description" name="description"
                    style="height: 256px"></textarea>
                    <label for="description">Description</label>
                </div>

                <button type="submit" class="btn btn-primary mt-5 text-white">Create</button>
            </form>
        </div>

    </div>
@endsection
