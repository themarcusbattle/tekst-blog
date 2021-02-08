<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Topix Post</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="p-3">
        <div class="sm:w-3/4 mx-auto">
            <h2 class="text-3xl">{{ $post['title'] }}</h2>
            <h3>{{ $post['subtitle'] }}</h3>
            <div class="my-10">
                {{ $post['content'] }}
            </div>
        </div>
    </body>
</html>
