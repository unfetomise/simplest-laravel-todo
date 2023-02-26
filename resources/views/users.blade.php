@extends('layouts.app')

@section('title')
    Users list
@endsection

@section('content')

<div class="flex flex-column justify-center justify-items align-items">

    @foreach ($users as $user)
        <div class="m-auto">{{ $user->name }}</div>
    @endforeach

</div>

@endsection