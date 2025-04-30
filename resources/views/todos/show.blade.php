@extends('layouts.index')

@section('title', 'Todo')
@section('content')
    <div class="container">
        <h1 class="text-center">Todo</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $todo->title }}</h5>
                <p class="card-text">{{ $todo->description }}</p>
                <p class="card-text">{{ $todo->completed ? 'Completed' : 'Not Completed' }}</p>
            </div>
        </div>
        <div class="mt-3">
            <div class="d-flex justify-content-between">
                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('todos.destroy', $todo->id) }}" method="post">
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <form action="{{ route('todos.complete', $todo->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">Complete</button>
                    </form>
                    <a href="{{ route('todos.index') }}" class="btn btn-secondary">Back</a>
            </div>
@endsection