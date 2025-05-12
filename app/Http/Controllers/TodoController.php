<?php

namespace App\Http\Controllers;

use App\Models\Todo;
class TodoController
{
    public function index()
    {
        $todos = Todo::paginate(10);
        return view('todos.index', ['todos' => $todos]);
    }

    public function show($todo)
    {
        $todo = Todo::find($todo);
        if (!$todo) {
            return redirect()->route('todos.index')->with('error', 'Todo not found');
        }
        return view('todos.show', ['todo' => $todo]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|max:255',
            'description' => 'nullable'
        ]);

        Todo::create($data);
        return redirect()->route('todos.index');
    }

    public function edit($todo)
    {
        $todo = Todo::find($todo);
        if (!$todo) {
            return redirect()->route('todos.index')->with('error', 'Todo not found');
        }
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update($todo)
    {
        $data = request()->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);
        $todo = Todo::find($todo);
        if (!$todo) {
            return redirect()->route('todos.index')->with('error', 'Todo not found');
        }
        $todo->update($data);
        return redirect()->route('todos.index');
    }

    public function destroy($todo)
    {
        $todo = Todo::find($todo);
        if (!$todo) {
            return redirect()->route('todos.index')->with('error', 'Todo not found');
        }
        $todo->delete();
        return redirect()->route('todos.index');
    }

    public function complete($todo)
    {
        $todo = Todo::find($todo);
        if (!$todo) {
            return redirect()->route('todos.index')->with('error', 'Todo not found');
        }
        $todo->completed = true;
        $todo->save();
        return redirect()->route('todos.index');
    }

}
