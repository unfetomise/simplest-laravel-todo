@extends('layouts.app')
@section('title')
    Edit Todo
@endsection
@section('content')

<div class="m-auto mt-4 mb-0 pb-2">
    @if($errors->any())
    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
        Что-то пошло не так...
    </div>
    <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-2 text-red-700">
        @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </ul>
    @endif
</div>

    <form action="/update/{{ $todo->id }}" method="post" class="mt-4 p-4">
        @csrf
        @method('PATCH')
        <div class="form-group m-3">
            <label for="title">Todo Title</label>
            <input type="text" class="form-control" name="title" value="{{ $todo->title }}">
        </div>
        <div class="form-group m-3">
            <label for="description">Todo Description</label>
            <textarea class="form-control" rows="3" name="description">{{ $todo->description }}</textarea>
        </div>
        <div class="form-group m-3">
            <input type="submit" class="p-2 m-auto mt-4 bg-green-400 hover:bg-green-500 text-white rounded w-9/12 flex flex-row justify-center" value="Обновить">
        </div>
    </form>

@endsection