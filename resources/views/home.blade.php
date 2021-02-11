<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $blog['blog_title'] }}</title>
        <meta name="description" content="{{ $blog['seo_description'] }}">

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <style>
            * { font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; }
            p { margin-bottom: 1.5rem; }
            #blog-description a { color: rgba(37, 99, 235); text-decoration: underline; }
            /* #post-content a { color: rgba(37, 99, 235); text-decoration: underline; } */
        </style>
    </head>
    <body class="pt-24">
        <x-header :title="$blog['blog_title']" :frsh="$blog['frsh']" />

        <div class="border-b border-gray-100 mb-10">
            <div class="px-10 md:py-10 mx-auto sm:w-3/4 lg:w-1/2 text-gray-800">
                <div id="blog-description" class="text-lg font-light">
                    <?php echo html_entity_decode($blog['blog_description']) ?>
                </div>
            </div>
        </div>

        <div class="border-b border-gray-100 pb-20">
            <div class="px-10 md:py-10 mx-auto sm:w-3/4 lg:w-1/2 text-gray-800">
                @foreach($posts as $post)
                <div>
                    <h3 class="text-2xl font-bold mb-4"><a href="{{ $post['slug'] }}">{{ $post['title'] }}</a></h3>
                    <p class="text-sm text-gray-500">Posted {{ $post['created'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="py-10 text-sm text-gray-400 font-light">
            <div class="px-10 md:py-10 mx-auto sm:w-3/4 lg:w-1/2 text-gray-500">
                <span>&copy <?php echo date("Y"); ?> {{ $blog['blog_title']}}. Built with Tekst.</span>
            </div>
        </div>
    </body>
</html>
