<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            {{-- UPDATE INFO USER --}}
            @can('admin.users.edit')
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')
                    <x-jet-section-border />
                @endif
            @endcan
            {{-- UPDATE PASS --}}
            @can('admin.users.edit.password')
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>
                    <x-jet-section-border />
                @endif
            @endcan
            {{-- AUTHENTIC TWO FACTOR --}}
            @can('admin.users.edit.factor')
                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>
                    <x-jet-section-border />
                @endif
            @endcan
            {{-- BROWSER SESSIONS --}}
            @can('admin.users.edit.sessions')
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>
            @endcan

            {{-- DELETE ACOUNT --}}
            @can('admin.users.edit.delete')
                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <x-jet-section-border />
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.delete-user-form')
                        </div>
                @endif
            @endcan
        </div>
    </div>
</x-app-layout>
