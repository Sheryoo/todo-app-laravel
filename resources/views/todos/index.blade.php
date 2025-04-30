@extends('layouts.index')

@section('title', 'Todo List')
@section('content')
    <div class="container mt-4">
        <h1>Todo List</h1>
        <div class="table-responsive">
            @if($todos->isEmpty())
                <p>No todos found</p>
                <div class="text-center">
                    <a href="{{ route('todos.create') }}" class="btn btn-primary">Create First Todo</a>
                </div>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Is Completed</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todos as $todo)
                        <tr>
                            <td><a href="{{ route('todos.show', $todo->id) }}" class="text-decoration-none text-dark">{{ $todo->id }}</a></td>
                            <td>{{ $todo->title }}</td>
                            <td>{{ $todo->description }}</td>
                            <td>
                                @if($todo->completed)
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary btn-sm mx-2 mb-2">Edit</a>
                                    <form action="{{ route('todos.destroy', $todo->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mx-2" onclick="return confirm('Are you sure you want to delete this todo?')">Delete</button>
                                    </form>
                                    @if(!$todo->completed)
                                        <form action="{{ route('todos.complete', $todo->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm mx-2">Complete</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center mt-3">
                <a href="{{ route('todos.create') }}" class="btn btn-primary">Create New Todo</a>
            </div>
            @endif
        </div>
    </div>
@endsection

