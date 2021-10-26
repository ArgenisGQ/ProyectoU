<x-app-layout>

    <div class="max-w-5xl px-2 py-8 mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl text-center uppercase font-hold">Etiqueta: "{{$course->name}}"</h1>

        @foreach ($activities as $activity)
            <x-card-activity :activity="$activity"/>
        @endforeach
        <div class="mt-4">
            {{$activities->links()}}
        </div>
    </div>
</x-app-layout>
