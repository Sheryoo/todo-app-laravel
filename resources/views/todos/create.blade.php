@extends('layouts.index')

@section('title', 'Create Todo')
@section('content')
    <div class="container">
        <h1>Create Todo</h1>
        <form action="{{ route('todos.store') }}" method="post">
            @csrf
            <input type="text" name="title" placeholder="Title" class="form-control mb-2" required>
            <input type="text" name="description" placeholder="Description" class="form-control mb-2" required>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
        <a href="{{ route('todos.index') }}" class="btn btn-secondary mt-2">Back</a>
    </div>
@endsection

