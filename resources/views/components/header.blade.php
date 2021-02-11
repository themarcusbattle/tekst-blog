<div class="bg-white border-b mb-8 fixed top-0 w-full">
    <div class="py-4 px-10 mx-auto sm:w-3/4 lg:w-1/2 text-gray-800 flex items-center">
        <span class="flex-1">
            <h1 id="blog-title" class="text-l font-medium"><a href="/">{{ $title }}</a></h1>
        </span>
        <div class="flex-initial flex items-center">
            <a class="sm:hidden mr-4" href="/topics">Topics</a>
            <ul class="hidden sm:block space-x-3 mr-4 flex items-center">
                @foreach($topics as $topic)
                <li class="inline"><a href="/{{ $topic['slug'] }}" class="">{{ $topic['name'] }}</a></li>
                @endforeach
            </ul>
        </div>
        <span>
            @if($frsh)
            <a href="{{ $frsh }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            </a>
            @endif
        </span>
    </div>
</div>