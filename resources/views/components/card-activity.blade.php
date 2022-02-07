
@props(['activity'])

<article class="mb-8 overflow-hidden bg-white rounded-lg shadow-lg">

    @if ($activity->image)
        <img class="object-cover object-center w-full h-72" src="{{Storage::url($activity->image->url)}}" alt="" >
    @else
        <img class="object-cover object-center w-full h-72" src="https://cdn.pixabay.com/photo/2016/11/30/12/16/question-mark-1872665_960_720.jpg" alt="" >
    @endif

    <h1 class="mb-2 text-xl font-bold">
        <a href="{{route('posts.show', $activity)}}">{{$activity->name}}</a>
    </h1>

    <div class="text-base text-gray-700">
        {!!$activity->extract!!}
    </div>

    <div class="px-6 pt-4 pb-2">
        @foreach ($activity->courses as $course)
            <a href="{{route('posts.tag', $course)}}" class="inline-block px-3 py-1 mr-2 text-sm text-gray-700 bg-gray-200 rounded-full">{{$course->name}}</a>
        @endforeach
    </div>
</article>
