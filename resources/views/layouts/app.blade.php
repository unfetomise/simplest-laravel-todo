<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
<nav class="bg-gray-50">
    <div class="container flex flex-row justify-between">
        <div class="flex flex-row">
            <div><a href="/todos"><span class="p-2 mx-2 my-2 bg-gray-400 hover:bg-gray-500 text-white rounded w-max flex font-bold">Todos</span></a></div>
            <div><a href="/todos/offline"><span class="p-2 mx-2 my-2 bg-gray-400 hover:bg-gray-500 text-white rounded w-max flex font-bold">Offline</span></a></div>
        </div>
        <div><a href="/todos/create"><span class="p-2 ml-2 my-2 bg-green-400 hover:bg-green-500 text-white rounded w-max flex justify-center font-bold">Создать Todo</span></a></div>
        
        <div class="flex flex-row">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-24 p-2 mx-2 my-2 bg-red-300 hover:bg-red-500 text-white rounded flex justify-center font-bold">Logout</button>
            </form>
        </div>
        
    </div>
</nav>

<div class="container">

    @yield('content')

</div>

</body>

</html>