<x-app-layout>


    <!--Container-->
    {{-- <div class="container max-w-6xl px-4 mx-auto -mt-10 md:px-0"> --}}
    <div class="container max-w-6xl px-4 mx-auto mt-5 md:px-0">

        <div class="mx-0 sm:mx-6">

            <div class="grid w-full grid-cols-3 gap-4 text-xl leading-normal text-gray-800 bg-gray-200 rounded-t md:text-2xl ">

                @foreach ($posts as $post)
                    <!--Lead Card-->

                    @if ($loop->first)



                        <div class="flex h-full col-span-3 overflow-hidden bg-white rounded shadow-lg">
                                <a href="{{route('posts.show', $post)}}" class="flex flex-wrap no-underline hover:no-underline">
                                    <div class="w-full rounded-t md:w-2/3">
                                        <img src="@if($post->image) {{Storage::url($post->image->url)}} @else https://source.unsplash.com/collection/225/800x600 @endif" class="w-full h-full shadow">
                                    </div>

                                    <div class="flex flex-col flex-grow flex-shrink w-full md:w-1/3">
                                        <div class="flex-1 overflow-hidden bg-white rounded-t rounded-b-none shadow-lg">
                                            <p class="w-full px-6 pt-6 text-xs text-gray-600 md:text-sm">
                                                {{App\Models\Category::find($post->category_id)->name}}
                                            </p>
                                            <div class="w-full px-6 text-xl font-bold text-gray-900">👋 {{$post->name}}</div>
                                            <p class="px-6 mb-5 font-serif text-base text-gray-800">
                                                This starter template is an attempt to replicate the default Ghost theme "Casper" using Tailwind CSS and vanilla Javascript.
                                            </p>
                                            <p class="w-full px-6 pt-6 text-xs text-gray-600 md:text-sm">
                                                {{App\Models\Category::find($post->category_id)->name}}
                                            </p>
                                        </div>

                                        <div class="flex-none p-6 mt-auto overflow-hidden bg-white rounded-t-none rounded-b shadow-lg">
                                            <div class="flex items-center justify-between">
                                                <img class="w-8 h-8 mr-4 rounded-full avatar" data-tippy-content="Author Name" src="http://i.pravatar.cc/300" alt="Avatar of Author">
                                                <p class="text-xs text-gray-600 md:text-sm">
                                                Creado hace 
                                                    @if ($today->diffInDays($post->created_at) <= 7)
                                                        @if ($today->diffInDays($post->created_at) === 1)
                                                            {{$today->diffInDays($post->created_at)}} dia
                                                        @else
                                                            {{$today->diffInDays($post->created_at)}} dias
                                                        @endif                                                        
                                                    @elseif ($today->diffInWeeks($post->created_at) <= 4)
                                                        @if ($today->diffInWeeks($post->created_at) === 1)
                                                            {{$today->diffInWeeks($post->created_at)}}  semana
                                                        @else
                                                            {{$today->diffInWeeks($post->created_at)}}  semanas
                                                        @endif                                                        
                                                    @elseif ($today->diffInMonths($post->created_at) <= 12 )
                                                        @if ($today->diffInMonths($post->created_at) === 1)
                                                            {{$today->diffInMonths($post->created_at)}}  mes
                                                        @else
                                                            {{$today->diffInMonths($post->created_at)}}  meses
                                                        @endif                                                        
                                                    @else
                                                        @if ($today->diffInYears($post->created_at) === 1)
                                                            {{$today->diffInYears($post->created_at)}}  año
                                                        @else
                                                            {{$today->diffInYears($post->created_at)}}  años
                                                        @endif                                                        
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </a>
                        </div>
                        <!--/Lead Card-->


                    @else

                        <!--Posts Container-->

                            <div class="flex flex-wrap justify-between pt-12 -mx-6">
                                <div class="flex flex-col flex-grow flex-shrink w-full p-6 md:w-1/3">
                                    <div class="flex-1 overflow-hidden bg-white rounded-t rounded-b-none shadow-lg">
                                        <a href="{{route('posts.show', $post)}}" class="flex flex-wrap no-underline hover:no-underline">
                                            <img src="@if($post->image) {{Storage::url($post->image->url)}} @else https://source.unsplash.com/collection/225/800x600 @endif" class="w-full h-64 pb-6 rounded-t">
                                            <p class="w-full px-6 text-xs text-gray-600 md:text-sm">
                                                {{App\Models\Category::find($post->category_id)->name}}
                                            </p>
                                            <div class="w-full px-6 text-xl font-bold text-gray-900">{{$post->name}}</div>
                                            <p class="px-6 mb-5 font-serif text-base text-gray-800">
                                                A Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula.
                                            </p>
                                        </a>
                                    </div>
                                    <div class="flex-none p-6 mt-auto overflow-hidden bg-white rounded-t-none rounded-b shadow-lg">
                                        <div class="flex items-center justify-between">
                                            <img class="w-8 h-8 mr-4 rounded-full avatar" data-tippy-content="Author Name" src="http://i.pravatar.cc/300" alt="Avatar of Author">
                                            <p class="text-xs text-gray-600 md:text-sm">
                                            Creado hace 
                                                @if ($today->diffInDays($post->created_at) <= 7)
                                                    @if ($today->diffInDays($post->created_at) === 1)
                                                        {{$today->diffInDays($post->created_at)}} dia
                                                    @else
                                                        {{$today->diffInDays($post->created_at)}} dias
                                                    @endif                                                        
                                                @elseif ($today->diffInWeeks($post->created_at) <= 4)
                                                    @if ($today->diffInWeeks($post->created_at) === 1)
                                                        {{$today->diffInWeeks($post->created_at)}}  semana
                                                    @else
                                                        {{$today->diffInWeeks($post->created_at)}}  semanas
                                                    @endif                                                        
                                                @elseif ($today->diffInMonths($post->created_at) <= 12 )
                                                    @if ($today->diffInMonths($post->created_at) === 1)
                                                        {{$today->diffInMonths($post->created_at)}}  mes
                                                    @else
                                                        {{$today->diffInMonths($post->created_at)}}  meses
                                                    @endif                                                        
                                                @else
                                                    @if ($today->diffInYears($post->created_at) === 1)
                                                        {{$today->diffInYears($post->created_at)}}  año
                                                    @else
                                                        {{$today->diffInYears($post->created_at)}}  años
                                                    @endif                                                        
                                                @endif
                                            </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>





                    @endif
                        <!--/ Post Content-->

                @endforeach





                <div class="col-span-3 mt-4">
                    {{$posts->links()}}
                </div>

                <!--Author-->
                <div class="flex items-center w-full col-span-3 p-8 font-sans md:p-24">
                    <img class="w-10 h-10 mr-4 rounded-full" src="http://i.pravatar.cc/300" alt="Avatar of Author">
                    <div class="flex-1">
                        <p class="text-base font-bold leading-none md:text-xl">Sistema Interactivo Multimodal de Aprendizaje (SIMA)</p>
                        <p class="text-xs text-gray-600 md:text-base">Creado por el Equipo de Tecnologia de DEMTec <a class="text-gray-800 no-underline border-b-2 border-green-500 hover:text-green-500" href="http://sima.uny.edu.ve/">sima.uny.edu.ve/</a></p>
                    </div>

                </div>
                <!--/Author-->

            </div>
        </div>



    </div>

</x-app-layout>
