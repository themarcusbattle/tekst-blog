<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Topix</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <style>
            * { font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; }
            p { margin-bottom: 1.5rem; }
            #blog-description a { color: inherit; font-weight: bold; }
        </style>
    </head>
    <body class="pt-28">
        <x-header :title="$blog['blog_title']" :frsh="$blog['frsh']" />

        <div class="px-10 mx-auto sm:w-3/4 lg:w-1/2 text-gray-800">
            <div id="blog-description" class="text-sm text-gray-500 mb-10 sm:w-3/4">
                <?php echo html_entity_decode($blog['blog_description']) ?>
            </div>
        
            @foreach($posts as $post)
            <div>
                <h3 class="text-2xl font-bold mb-4"><a href="{{ $post['slug'] }}">{{ $post['title'] }}</a></h3>
                <p class="text-sm text-gray-500">Posted {{ $post['created'] }}</p>
            </div>
            @endforeach
        </div>
    </body>
</html>
