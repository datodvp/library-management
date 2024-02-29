<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ბიბლიოთეკის მენეჯმენტი</title>
</head>

<body>
    <div style="display: flex; justify-content:space-between; align-items:center">
        <h1>ბიბლიოთეკის მენეჯმენტი</h1>
        <div>
            <a href="{{ route('home') }}">წიგნების სია</a>
            <a href="{{ route('books.create') }}">დაამატე წიგნი</a>
        </div>
    </div>

    <hr />

    {{ $slot }}
</body>

</html>
