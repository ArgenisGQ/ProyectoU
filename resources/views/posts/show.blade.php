<x-app-layout>
    <div class="container py-8">


        <h1 class="text-4xl text-gray-600 fond-bold">
            {{$post->name}}
        </h1>

        <h1 class="text-4xl text-gray-600 fond-bold">
            {!! auth()->user()->name !!}
        </h1>

        <div class="card-body">
            <h4>Bienvenido . {!! auth()->user()->name !!} </h4>
         </div>

        <hr size=20 >
        <div class="text-lg text-gray-500-mb-2">
            {!!$post->extract!!}
        </div>

        <hr>

        <div class="text-lg text-gray-500-mb-2">
            {!!$post->extract01!!}
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            {{-- contenido principal --}}
            <div class="lg:col-span-2">
                {{-- <figure>
                    @if ($post->image)
                        <img class="object-cover object-center w-full h-72" src="{{Storage::url($post->image->url)}}" alt="" >
                    @else
                        <img class="object-cover object-center w-full h-72" src="https://cdn.pixabay.com/photo/2016/11/30/12/16/question-mark-1872665_960_720.jpg" alt="" >
                    @endif
                </figure> --}}

                <div class="mt-4 text-base text-gray-500">
                    {!!$post->body!!}
                </div>
            </div>
            {{-- contenido relacionado --}}
            <aside>
                <h1 class="mb-4 text-2xl font-bold text-gray-600">Más en {{$post->category->name}}</h1>

                <ul>
                    @foreach ($similares as $similar)
                    <li class="mb-4">
                        <a class="flex" href="{{route('posts.show', $similar)}}" >
                            {{-- <img class="object-cover h-20 w-36 objet-center" src="{{Storage::url($similar->image->url)}}" alt="" > --}}
                            <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>

            </aside>
        </div>
    </div>
</x-app-layout>

