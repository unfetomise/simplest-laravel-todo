@extends('layouts.app')

@section('title')
    Create Todo
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

    <form action="/store" method="POST" class="mt-1 p-4 pt-1">
        @csrf
        <div class="form-group m-3">
            <label for="title">Todo title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group m-3">
            <label for="description">Todo Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <div class="form-group m-3">
            <input type="submit" class="p-2 m-auto mt-4 bg-green-400 hover:bg-green-500 text-white rounded w-9/12 flex flex-row justify-center font-bold" value="Сохранить">
        </div>
    </form>

@endsection