<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreTodoRequest;


class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', [
            'todos' => Todo::where('user_id', Auth::id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $request->validated();

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),  
        ]);

        return redirect('/todos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = $this->todoAuthorize($id);
        return view('edit')->with('todo', $todo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTodoRequest $request, string $id)
    {
        $request->validated();

        Todo::find($id)->update([
            'title' => $request->title,
            'description' => $request->description ?? '',
        ]);

        return redirect('/todos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->todoAuthorize($id);
        Todo::destroy($id);
        return redirect('/todos');
    }

    public function toggleCompleted($id)
    {
        $todo = $this->todoAuthorize($id);

        $todo->update([
            'completed' => !Todo::find($id)->completed
        ]);

        return redirect('/todos');
    }

    private function todoAuthorize($id)
    {
        $todo = Todo::find($id);
        $todo && Gate::authorize('update-todo', $todo);
        return $todo ?? abort(403);
    }
}
