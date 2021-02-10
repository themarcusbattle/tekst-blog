<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $post['title'] }} - {{ $blog['blog_title'] }}</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <style>
            * { font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; }
            p, h2, h3 { margin-bottom: 1.5rem; }
            h2 { font-weight: bold; font-size: 1.5rem; line-height: 1.25; }
            #post-content h2 { margin-top: 3rem; }
        </style>
    </head>
    <body class="pt-20">
        <div class="bg-white border-b mb-8 fixed top-0 w-full">
            <div class="py-3 px-10 mx-auto sm:w-1/2 text-gray-800">
                <h1 id="blog-title" class="text-l"><a href="/">{{ $blog['blog_title'] }}</a></h1>
            </div>
        </div>
        <div class="px-10 mx-auto sm:w-1/2 text-gray-800">
            <h2 class="text-4xl mb-4 font-bold">{{ $post['title'] }}</h2>
            <h3>{{ $post['subtitle'] }}</h3>
            <div class="text-gray-500 space-x-4">
                <span><a href="mailto:{{ $post['author']['email'] }}" class="text-yellow-600">{{ $post['author']['name'] }}</a><span>
                <span>{{ $post['created'] }}</span>
            </div>
            <div id="post-content" class="my-10 mb-20">
                <?php echo html_entity_decode($post['content']) ?>
            </div>
            <div class="py-10 text-sm text-gray-400">
                <span>&copy <?php echo date("Y"); ?> {{ $blog['blog_title'] }}</span>
            </div>
        </div>
    </body>
</html>
