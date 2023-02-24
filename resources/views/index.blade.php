@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')
@vite('resources/js/app.js')
    <div class="flex justify-center justify-items align-items h-screen">
        <div id="todos" class="my-5">
            <table class="table-auto">
                    @foreach ($todos as $key => $todo)
                    <tr class="bg-gray-50">
                        <td><form action="/{{ $todo->id }}" method="POST"> @csrf
                            <input type="checkbox" class="p-3 m-2 w-10 h-10" onclick="this.form.submit()">
                            <input type="hidden" name="id" value="">
                            </form>
                        </td>
                        <td><span class="p-2 m-1 text-2xl rounded align-middle text-left {{ $todo->completed ? 'line-through' : '' }}">{{ $todo->title }}</span></td>
                        <td><a href="/edit/{{ $todo->id }}"><span class="p-2 m-1 bg-yellow-300 hover:bg-yellow-400 text-white rounded font-bold">ИЗМЕНИТЬ</span></a></td>
                        <td><form id="{{ $key.'f' }}" action="/destroy/{{ $todo->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id='good'
                            class="inline-flex items-center p-2 m-1 bg-red-400 hover:bg-red-700 text-white rounded font-bold" type="button"
                            >УДАЛИТЬ
                            </button>    
                        </form></td>
                    </tr>                    
                    @endforeach
                </div>        
            </table>
    </div>

@endsection
