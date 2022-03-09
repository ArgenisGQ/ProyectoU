<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Id Number -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ced" value="{{ __('Ced') }}" />
            <x-jet-input id="ced" type="text" class="mt-1 block w-full" wire:model.defer="state.ced" autocomplete="ced" />
            <x-jet-input-error for="ced" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- UserName -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="username" value="{{ __('Username') }}" />
            <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model.defer="state.username" autocomplete="username" />
            <x-jet-input-error for="username" class="mt-2" />
        </div>


        <!-- Roles -->
        {{-- @foreach ($roles as $role)
            <div class="col-span-6 sm:col-span-4">
                <x-jet-checkbox name={{$role->name}} id={{$role->id}}/>

                <div class="ml-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" value="{{ $role->id}}" wire:model="selectedtypes"  class="form-checkbox h-6 w-6 text-green-500">
                        <span class="ml-3 text-sm">{{ $type->name }}</span>
                    </label>
                </div>
            </div>

        @endforeach --}}

        <div class="col-span-6 sm:col-span-4">
            <div class="field">
                <label class="label is-small">Sports:</label>
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="football" value="1" {{ Auth::user()->football === '1' ? 'checked' :''}} wire:model.defer="state.football">
                        Football
                    </label>
                    <label class="checkbox">
                    <input type="checkbox" name="rugby" value="1"  {{ Auth::user()->rugby === '1' ? 'checked' :''}}>
                        Rugby
                    </label>
                    <label class="checkbox">
                    <input type="checkbox" name="tennis" value="1"  {{ Auth::user()->tennis === '1' ? 'checked' :''}}>
                        Radio
                    </label>
                </div>
            </div>
        </div>




        {{-- <div>
            <label>
                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}

            </label>
        </div>
 --}}

    </label>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
