<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $post['title'] }} - {{ $blog['blog_title'] }}</title>
        <meta name="description" content="{{ $blog['seo_description'] }}">
        <meta property="og:title" content="{{ $post['title'] }}">

        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:site_name" content="{{ $blog['seo_title'] }}" />
        <meta property="og:type" content="article" />
        <meta name="twitter:site" content="{{ $blog['twitter_username'] }}" />
        <meta name="twitter:title" content="{{ $post['title'] }}">
        <meta name="twitter:card" content="summary" />

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            * { font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; }
            p, h2, h3, blockquote { margin-bottom: 1.5rem; }
            h2 { font-weight: bold; font-size: 1.5rem; line-height: 1.25; }
            #post-content h2 { margin-top: 3rem; }
            #post-content a { color: rgba(37, 99, 235); text-decoration: underline; }
            #post-content blockquote { background-color: rgba(255, 251, 235); padding: 1.5rem; border-radius: .375rem; }
            #post-content blockquote p:last-of-type { margin-bottom: 0; }
            #post-content ul { padding-left: 1rem; list-style-type: disc; margin-bottom: 1.5rem; }
        </style>
        @if($blog['plausible_domain'])
        <script async defer data-domain="{{ $blog['plausible_domain'] }}" src="https://plausible.io/js/plausible.js"></script>
        @endif
    </head>
    <body class="pt-28">
        <x-header :title="$blog['blog_title']" :frsh="$blog['frsh']" :topics="$topics" />

        <div class="px-10 mx-auto sm:w-3/4 lg:w-1/2 text-gray-800">
            <h2 class="text-4xl mb-4 font-bold">{{ $post['title'] }}</h2>
            <h3>{{ $post['subtitle'] }}</h3>
            <div class="text-gray-500 space-x-4 text-sm">
                <span class="inline"><a href="mailto:{{ $post['author']['email'] }}" class="font-bold">{{ $post['author']['name'] }}</a><span>
                <span class="inline ml-2">{{ $post['created'] }}</span>
            </div>
            <div id="post-content" class="my-10 mb-20">
                <?php echo html_entity_decode($post['content']) ?>
            </div>
        </div>

        <div class="py-10 text-sm text-gray-400 font-light">
            <div class="px-10 md:py-10 mx-auto sm:w-3/4 lg:w-1/2 text-gray-500">
                <span>&copy <?php echo date("Y"); ?> {{ $blog['blog_title']}}. Built with Tekst.</span>
            </div>
        </div>
    </body>
</html>
