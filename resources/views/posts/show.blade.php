<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl fond-bold text-gray-600">
            {{$post->name}}
        </h1>
        <div class="text-lg text-gray-500-mb-2">
            {!!$post->extract!!}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- contenido principal --}}
            <div class="lg:col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-72 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="" >
                    @else
                        <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2016/11/30/12/16/question-mark-1872665_960_720.jpg" alt="" >
                    @endif
                </figure>

                <div class="text-base text-gray-500 mt-4">
                    {!!$post->body!!}
                </div>
            </div>
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{$post->category->name}}</h1>

                <ul>
                    @foreach ($similares as $similar)
                    <li class="mb-4">
                        <a class="flex" href="{{route('posts.show', $similar)}}" >
                            <img class="w-36 h-20 object-cover objet-center" src="{{Storage::url($similar->image->url)}}" alt="" >
                            <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>

            </aside>
        </div>
    </div>
</x-app-layout>

