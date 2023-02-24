<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', [
            'todos' => Todo::where('user_id', 1)->get()
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:60',
            'description' => 'max:400',
        ]);

        Todo::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => 1,
            'completed' => 0,          
        ]);

        return redirect(route('index'));
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
        return view('edit')->with('todo', Todo::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Todo::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description ?? '',
        ]);

        return redirect(route('index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::destroy($id);

        return redirect(route('index'));
    }

    public function toggleCompleted($id)
    {
        Todo::where('id', $id)->update([
            'completed' => !Todo::find($id)->completed
        ]);

        return redirect(route('index'));
    }

    public function offline()
    {
        return view('offline');
    }
}
