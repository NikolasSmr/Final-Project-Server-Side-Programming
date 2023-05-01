<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index()
    {
        $todolists = TodoList ::all();
        return view ('todo-lists', compact('todolists'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required',
        ]);
        TodoList::create($data);
        return back();
    }
    public function edit($id)
    {
    $todolist = TodoList::find($id);
    return view('edit', compact('todolists'));
    }

    public function update(Request $request, $id)
    {
    $todolist = TodoList::find($id);
    $todolist->content = $request->content;
    $todolist->save();
    return redirect()->route('todo-lists');
    }

    public function destroy(TodoList $todoList)
    {
       $todoList->delete();
       return back();
    }
}
