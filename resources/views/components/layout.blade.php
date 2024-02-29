<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ბიბლიოთეკის მენეჯმენტი</title>
</head>

<body class="bg-slate-500">
    <div class="flex justify-between items-center p-10 mb-10">
        <h1 class="text-4xl font-bold text-white">ბიბლიოთეკის მენეჯმენტი</h1>
        <div>
            @if (!request()->routeIs('home'))
                <a href="{{ route('home') }}"
                    class="border rounded-lg bg-gray-600 hover:bg-gray-700 text-white font-bold p-3">წიგნების სია</a>
            @endif

            @if (!request()->routeIs('books.create'))
                <a href="{{ route('books.create') }}"
                    class="border rounded-lg bg-gray-800 hover:bg-gray-900 text-white font-bold p-3">დაამატე წიგნი</a>
            @endif

        </div>
    </div>

    {{ $slot }}
</body>

</html>
