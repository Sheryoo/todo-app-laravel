@extends('layouts.index')

@section('title', 'Edit Todo')
@section('content')
    <div class="container">
        <h1>Edit Todo {{ $todo->id }}</h1>
        <form action="{{ route('todos.update', $todo->id) }}" method="post">
            @csrf
            @method('put')
        <input type="text" name="title" value="{{ $todo->title }}" class="form-control mb-2">
        <input type="text" name="description" value="{{ $todo->description }}" class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <a href="{{ route('todos.index') }}" class="btn btn-secondary mt-2">Back</a>
@endsection

