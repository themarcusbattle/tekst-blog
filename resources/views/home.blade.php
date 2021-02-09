<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Topix</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="p-3">
        <div class="mx-auto sm:w-1/2">
            <h1 id="blog-title" class="text-xl mb-4">{{ $blog['blog_title'] }}</h1>
            <p id="blog-description" class="text-sm text-gray-500">{{ $blog['blog_description'] }}</p>
        </div>
    </body>
</html>
