<div class="flex items-center w-full col-span-3 p-8 font-sans md:p-24">
    <img class="w-10 h-10 mr-4 rounded-full" src="{{(App\Models\User::find($post->user_id)->profile_photo_url)}}" alt="Avatar of Author">
    <div class="flex-1">
        <p class="text-base font-bold leading-none md:text-xl">Sistema Interactivo Multimodal de Aprendizaje (SIMA)</p>
        <p class="text-xs text-gray-600 md:text-base">Creado por el Equipo de Tecnologia de DEMTec <a class="text-gray-800 no-underline border-b-2 border-green-500 hover:text-green-500" href="http://sima.uny.edu.ve/">http://sima.uny.edu.ve/</a></p>
    </div>

</div>
