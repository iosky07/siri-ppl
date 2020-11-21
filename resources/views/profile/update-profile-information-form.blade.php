<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Lihat atau Edit Profil Anda') }}
    </x-slot>

    <x-slot name="form">

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nama') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('NIK') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.nik" autocomplete="nik" />
            <x-jet-input-error for="nik" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Alamat') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.address" autocomplete="address" />
            <x-jet-input-error for="address" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nomor HP') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.nomor_hp" autocomplete="nomor_hp" />
            <x-jet-input-error for="nomor_hp" class="mt-2" />
        </div>

        @if(Auth::user()->role==2)
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Status') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.status" autocomplete="status" />
            <x-jet-input-error for="status" class="mt-2" />
        </div>
        @endif

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
