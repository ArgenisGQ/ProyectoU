<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-hold">Categoria: {{$category->name}}</h1>

        @foreach ($posts as $post)
            <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                <h1 class="font-bold text-xl mb-2">
                    <a href="{{route('posts.show'), $post}}">{{$post->name}}</a>
                </h1>

                <div class="text-gray-700 text-base">
                    {{$post->extract}}
                </div>
            </article>
        @endforeach
    </div>
</x-app-layout>


