<x-app-layout>
     <div class="container py-8">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($activities as $activity)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif"  style="background-image: url(@if($activity->image) {{Storage::url($activity->image->url)}} @else https://cdn.pixabay.com/photo/2016/11/30/12/16/question-mark-1872665_960_720.jpg @endif)">
                    <div class="flex flex-col justify-center w-full h-full px-8">
                       <div>
                            @foreach ($activity->courses as $course)

                                <a href="{{route('activities.course', $course)}}" class="inline-block h-6 px-3 text-white bg-{{$course->color}}-500 rounded-full">
                                    {{$course->name}}
                                </a>
                            @endforeach
                        </div>

                        <h1 class="text-4xl font-bold leading-8 text-white">
                            <a href="{{route('posts.show', $activity)}}">
                                {{$activity->name}}
                            </a>
                        </h1>
                    </div>
                    {{--  http://proyectouny.uny.pc//storage/posts/75746ce0f74fb5282628fe78b253558d.png --}}
                    {{-- <img src="{{Storage::url($post->image->url)}}" alt=""> --}}
                    {{-- {{Storage::url($post->image->url)}} --}}
                    {{-- {{$post->image->url}} --}}
                </article>
            @endforeach
        </div>
        <div class="mt-4">
            {{$activities->links()}}
        </div>
    </div>
</x-app-layout>
