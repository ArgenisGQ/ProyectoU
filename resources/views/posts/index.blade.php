<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-3 gap-6">
            @foreach ($posts as $post)
                {{-- <article> --}}
                <article class="w-full h-80 bg-cover bg-center" style="background-image: url({{Storage::url($post->image->url)}})">
                    {{-- <img src="{{Storage::url($post->image->url)}}" alt=""> --}}
                    {{-- {{Storage::url($post->image->url)}} --}}
                    {{-- {{$post->image->url}} --}}
                </article>
            @endforeach
        </div>
    </div>
</x-app-layout>
