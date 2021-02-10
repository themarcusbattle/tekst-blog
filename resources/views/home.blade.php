<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Topix</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <style>
            * { font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; }
        </style>
    </head>
    <body class="pt-20">
        <div class="bg-white border-b mb-8 fixed top-0 w-full">
            <div class="py-3 px-10 mx-auto sm:w-1/2 text-gray-800">
                <h1 id="blog-title" class="text-l"><a href="/">{{ $blog['blog_title'] }}</a></h1>
            </div>
        </div>

        <div class="px-10 mx-auto sm:w-1/2 text-gray-800">
            <p id="blog-description" class="text-sm text-gray-500 mb-10 sm:w-3/4">
                {{ $blog['blog_description'] }}
            </p>
        
            @foreach($posts as $post)
            <div>
                <h3 class="text-2xl font-bold mb-4"><a href="{{ $post['slug'] }}">{{ $post['title'] }}</a></h3>
                <p class="text-sm text-gray-400">Posted {{ $post['created'] }}</p>
            </div>
            @endforeach
        </div>
    </body>
</html>
